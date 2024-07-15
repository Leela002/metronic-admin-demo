<?php

namespace App\Http\Controllers;

use App\DataTables\Master\ParameterMasterDataTable;
use App\Http\Controllers\Controller;
use App\Models\ParameterMaster;
use App\Models\FundCategory;
use App\Models\FundType;
use App\Http\Requests\StoreParameterMasterRequest;
use App\Http\Requests\UpdateParameterMasterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Illuminate\Support\Facades\Mail;

class ParameterMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  function __construct()
    //  {
    //     $this->middleware(PermissionMiddleware::class.':parameter_list|parameter_create|parameter_edit', ['only' => ['index']]);
    //     $this->middleware(PermissionMiddleware::class.':parameter_create', ['only' => ['create', 'store']]);
    //     $this->middleware(PermissionMiddleware::class.':parameter_edit', ['only' => ['edit', 'update_user']]);
      
    //  }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $identities = ParameterMaster::paginate($perPage);
        return view('master_data.parameter_master.index', compact('identities', 'perPage'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('master_data.parameter_master._create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreParametersRequest $request
     * @return Response
     */
    public function store(StoreParameterMasterRequest $request): RedirectResponse
    {
        //dd($request->all());
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->name;
        ParameterMaster::create($requestData);

        // $parameter_master = new ParameterMaster();
        // $parameter_master->parameter_name = $request->parameter_name;
        // $parameter_master->help_text = $request->help_text;
        // $parameter_master->slug = $request->slug;
        // $parameter_master->value = $request->value;
        // $parameter_master->save();
        return redirect()->route('parameter.index')
            ->with('success', 'Parameter created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(ParameterMaster $parameter_master): View
    {
        return view('master_data.parameter_master._details', compact('parameter_master'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParameterMaster $id): View
    {
        $identity = ParameterMaster::select()->where('id', $id->id)->first();
        return view('master_data.parameter_master._update', compact('id', 'identity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParameterMasterRequest $request, $id): RedirectResponse
{
    $requestData = $request->all();
    $requestData['updated_by'] = Auth::user()->name;

    // Find the record by its ID
    $parameterMaster = ParameterMaster::find($id);
    if ($parameterMaster) {
        // Update the record
        $parameterMaster->update($requestData);

        return redirect()->route('parameter.index')
            ->with('success', 'Parameter updated successfully.');
    }

    return redirect()->route('parameter.index')
        ->with('error', 'Parameter not found.');
}
    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Parameter $parameter)
    // {
    //     if ($parameter->delete()) {
    //         // Record was successfully deleted
    //         return redirect()->route('setting.parameters.index')
    //             ->with('success', 'Parameter deleted successfully.');
    //     } else {
    //         // Record deletion failed
    //         return redirect()->route('setting.parameters.index')
    //             ->with('error', 'Failed to delete the parameter.');
    //     }
    // }
}
