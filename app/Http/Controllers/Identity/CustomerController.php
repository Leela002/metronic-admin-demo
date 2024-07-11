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
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        if($search != ""){
            $identities = Customer::where('first_name','LIKE',"%$search%")
            ->orWhere('last_name','LIKE',"%$search%")
            ->orWhere('email','LIKE',"%$search%")
            ->orWhere('contact','LIKE',"%$search%")
            ->get();
        }else{
            $identities = Customer::paginate(2);
        }
        $info = auth()->user()->info;
        return view('pages.identity.index', compact('info', 'identities', 'search'));
    }

    public function create()
    {
        return view('pages.identity.profile.create');
    }
    public function store(StoreCustomerRequest $request): RedirectResponse
    {

        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->name;

        Customer::create($requestData);
        return redirect()->route('profile.index')
            ->with('success', 'New customer added successfully.');
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
    // Get all validated data from the request
    $requestData = $request->validated();

    // Add the 'updated_by' field
    $requestData['updated_by'] = Auth::user()->name;

    // Update the customer record with the validated data
    $id->update($requestData);

    return redirect()->route('profile.index')
        ->with('success', 'Customer updated successfully.');
}


    public function destroy($id)
{
    $identity = Customer::find($id);

    if($identity) {
        $identity->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false]);
    }
}
}
