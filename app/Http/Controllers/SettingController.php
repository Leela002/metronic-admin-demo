<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $socials = Setting::all();
        return view('pages.setting.social_media.index', compact('socials'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        return view('pages.setting.social_media.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|unique:social_media|max:50',
            'url' => 'required|url',  // Ensure 'url' field contains a valid URL
        ]);

        // Create a new social media setting
        $social = new Setting();
        $social->name = $validatedData['name'];
        $social->url = $validatedData['url'];
        $social->save();

        // Redirect to the index page with a success message
        return redirect()->route('social_media.index')->with('success', 'Social media setting created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Setting $parameter_master): View
    {
        return view('pages.setting.social_media.index', compact('parameter_master'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $social = Setting::findOrFail($id);
        return view('pages.setting.social_media.update', compact('social'));
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'url' => 'required|url',
        ]);

        // Create a new social media setting
        $social = Setting::findOrFail($request->id);
        $social->name = $validatedData['name'];
        $social->url = $validatedData['url'];
        $social->save();
        return redirect()->route('social_media.index')->with('success', 'Social media setting created successfully!');

    }
    public function destroy($id)
    {
        $social = Setting::find($id);
        if ($social) {
            $social->delete();
            return redirect()->route('social_media.index')->with('success', 'Role deleted successfully');
        } else {
            return redirect()->route('social_media.index')->with('error', 'Role not found');
        }
    }

}
