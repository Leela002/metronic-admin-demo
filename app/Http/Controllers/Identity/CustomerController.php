<?php

namespace App\Http\Controllers\Identity;

use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $info = auth()->user()->info;
        $identities = Customer::all();
        return view('pages.identity.index', compact('info', 'identities'));
    }

    public function create()
    {
        return view('pages.identity.profile.create');
    }
    public function store(StoreCustomerRequest $request): RedirectResponse
    {

        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->email;

        Customer::create($requestData);
        return redirect()->route('profile.index')
            ->with('success', 'New employee added successfully.');
    }
    public function show(): View
    {
        $identities = Customer::all(); // Fetch all identities
        return view('pages.identity.index', compact('identities'));
    }
    public function edit(Customer $id)
    {
        $identity = Customer::select()->where('id', $id->id)->first();

        return view('pages.identity.profile.update  ', compact('id', 'identity'));
    }

    public function update(UpdateCustomerRequest $request, Customer $id): RedirectResponse
    {
        $requestData = [];
        $requestData['emp_id'] = $request->emp_id;
        $requestData['first_name'] = $request->first_name;
        $requestData['last_name'] = $request->last_name;
        $requestData['contact'] = $request->contact;
        $requestData['email'] = $request->email;
        $requestData['per_address'] = $request->per_address;
        $requestData['gender'] = $request->gender;
        $requestData['blood_group'] = $request->blood_group;
        $requestData['dob'] = $request->dob;
        $requestData['updated_by'] = Auth::user()->email;

        $identity = Customer::select()->where('id', $id->id)->update($requestData);

        // dd($x ,$identity,$request->all());

        return redirect()->route('profile.index', ['identity' => $identity])
            ->with('success', 'Employee profile updated successfully.');
    }

    public function destroy($id)
    {
        $identity = Customer::findOrFail($id);
        $identity->delete();

        return redirect()->route('profile.index')->with('success', 'Employee deleted successfully.');
    }
}
