<?php

namespace App\Http\Controllers\Identity;

use App\Http\Controllers\Controller;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $info = auth()->user()->info;
        $identities = Profile::all(); 
        return view('pages.identity.index', compact('info', 'identities'));
    }
    
    public function create()
    {
        return view('pages.identity.profile.create');
    }
    public function store(StoreProfileRequest  $request): RedirectResponse
    {
        $requestData = $request->all();
       
        $requestData['created_by'] = Auth::id();
   
        Profile::create($requestData);
         return redirect()->route('profile.index')
             ->with('success','new employee added successfully.');
    }
    public function show(): View
    {
        $identities = Profile::all(); // Fetch all identities
        return view('pages.identity.index', compact('identities'));
    }
    public function edit(Profile $id)
    {
        $identity = Profile::select()->where('id', $id->id)->first();

        return view('pages.identity.profile.update  ', compact('id' ,'identity'));
          
    }

    public function update(UpdateProfileRequest $request, Profile $id): RedirectResponse
    {
    $requestData=[];
        $requestData['name'] = $request->name;
        $requestData['emp_id'] = $request->emp_id;
        $requestData['father_name'] = $request->father_name;
        $requestData['mother_name'] = $request->mother_name;
        $requestData['cur_address'] = $request->cur_address;
        $requestData['per_address'] = $request->per_address;
        $requestData['gender'] = $request->gender;
        $requestData['blood_group'] = $request->blood_group;
        $requestData['dob'] = $request->dob;
        
        $identity = Profile::select()->where('id', $id->id)->update($requestData);
       
        // dd($x ,$identity,$request->all());
    
        return redirect()->route('profile.index', ['identity' => $identity ])
             ->with('success', 'Employee profile updated successfully.');
    }
    
    public function destroy($id)
    {
        $identity = Profile::findOrFail($id);
        $identity->delete();

        return redirect()->route('profile.index')->with('success', 'Employee deleted successfully.');
    }
    
}