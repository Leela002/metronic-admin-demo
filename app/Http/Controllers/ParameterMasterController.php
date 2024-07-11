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

    public function index(ParameterMasterDataTable $dataTable): mixed
    {
        $identities = ParameterMaster::all();
        return view('master_data.parameter_master.index', ['identities' => $identities]);
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
    public function edit(ParameterMaster $parameter_master): View
    {
        return view('master_data.parameter_master._update', compact('parameter_master'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParameterMasterRequest $request, ParameterMaster $parameter_master): RedirectResponse
    {
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::id();
        $parameter_master->update($requestData);

          
            if (isset($requestData['slug']) && $requestData['slug'] === 'int_rate_direction') {
               
                $email = ['sahilj@leometric.com', 'investments@everguardlife.com'];
              
                if (isset($requestData['value']) && $requestData['value'] == 0) {
                    Mail::send('emails.intrest_rate', ['value' =>$requestData['value']], function ($message) use ($email) {
                        $message->to($email)->subject('Expected Interest Rate Direction Changed to Up');
                    });
                } else {
                    Mail::send('emails.intrest_rate', ['value' =>$requestData['value']], function ($message) use ($email) {
                        $message->to($email)->subject('Expected Interest Rate Direction Changed to Down');
                    });
                }
            }
       
        
      
        return redirect()->route('parameter.index')
            ->with('success', 'Client updated successfully.');
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
