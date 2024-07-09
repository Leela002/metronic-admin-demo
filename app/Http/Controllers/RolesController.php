<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\DataTables\Master\RoleDataTable;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class RolesController extends Controller
{
  
    // function __construct()
    // {
    //     $this->middleware('permission:roles_list|roles_create|roles_edit|roles_delete', ['only' => ['index','show']]);
    //     $this->middleware('permission:roles_create', ['only' => ['create','store']]);
    //     $this->middleware('permission:roles_edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:roles_delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $dataTable)
    {        
        $identities = Role::all();
        return view('master_data.role.index', ['identities' => $identities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('master_data.role._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $request->validate([
            'name' => 'required|unique:roles|max:50',
        ]);
    
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
       
        return redirect()->route('roles.index')->with('success', 'Role added successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = theme()->getOption('page');

        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::where('id', $id)
        ->first();

      
        return view('master_data.role._update', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
 public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|unique:roles|max:50',
    ]);

    $role = Role::find($id);
    $role->name = $request->name;
    $role->guard_name = 'web';
    $role->save();

    $identities = Role::all();
    return redirect()->route('roles.index')->with('success', 'Role updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
        } else {
            return redirect()->route('roles.index')->with('error', 'Role not found');
        }
    }
    
    
}
