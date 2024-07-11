<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\Master\UserDataTable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// use DB;

class UsersController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:users_list|user_create|user_edit|user_delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('master_data.user.index', ['users' => $users]);

    }

    // public function updateSelection()
    // {
    //     // Retrieve the currently authenticated user
    //     $user = Auth::user();

    //     // Explode the dashboard setting data into an array and remove empty elements
    //     $storedCards = array_filter(explode(',', $user->dashboard_setting));

    //     return view('card_dashboard.card_filter', compact('storedCards'));
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        return view('master_data.user._create', compact('roles'));
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
        //return $request;      
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email', // Check uniqueness in the "users" table for the "email" column
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $checkemail = User::where('email', $request->email)->get();
        if (count($checkemail) > 0) {
            return redirect()->back()->with('error', 'Email already exists');
        }

        /*
        if (!preg_match("/[A-Z]/", $request->password) || !preg_match("#[0-9]+#", $request->password) || !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $request->password)) {
            return redirect()->back()->with('error', 'Password Must contain at least one capital letter, number and one special character');
        }
        */

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        $user->assignRole($request->role_id);

        return redirect('/users')->with('success', 'User added successfully');
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


    public function saveSelectedCards(Request $request)
    {
        try {
            // Get the currently authenticated user
            $user = Auth::user();

            // Decode the JSON data from the request
            $selectedCards = json_decode($request->input('selectedCards'));

            // Convert the selected cards array to a comma-separated string
            $dashboardSetting = implode(',', $selectedCards);

            // Update the user's dashboard_setting column with the comma-separated string
            DB::table('users')->where('id', $user->id)->update(['dashboard_setting' => $dashboardSetting]);

            return response()->json(['message' => 'Selected cards saved successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        $userData = User::find($id);
        $roles = Role::select('id', 'name')->get();
        return view('master_data.user._update', compact('userData', 'roles'));
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
        //return $request;      
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        $checkemail = User::where([['email', $request->email], ['id', '!=', $id]])->get();
        if (count($checkemail) > 0) {
            return redirect()->back()->with('danger', 'Email already exists');
        }

        /*
        if (!preg_match("/[A-Z]/", $request->password) || !preg_match("#[0-9]+#", $request->password) || !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $request->password)) {
            return redirect()->back()->with('error', 'Password Must contain at least one capital letter, number and one special character');
        }
        */

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();

        $user->assignRole($request->role_id);

        return redirect('/users')->with('success', 'User updated successfully');
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
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        // Delete from database
        $user->delete();
        return redirect('/users')->with('success', 'User deleted successfully.');
    }

}
