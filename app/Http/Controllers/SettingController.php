<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use App\Models\Upload;
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
        $perPage = $request->input('per_page', 10);
        $socials = Setting::paginate($perPage);
        return view('pages.setting.social_media.index', compact('socials', 'perPage'));
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
            'url' => 'required|url',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'icon.required' => 'The Upload Icon field is required.',
            'icon.image' => 'The Upload Icon must be an image.',
            'icon.mimes' => 'The Upload Icon must be a file of type: jpeg, png, jpg, gif, svg.',
            'icon.max' => 'The Upload Icon may not be greater than 2MB.'
        ]);

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/icons/' . $filename;
            $file->move(public_path('uploads/icons'), $filename);

            // Save to upload_master
            $upload = new Upload();
            $upload->name = $filename;
            $upload->size = $file->getSize();
            $upload->type = $file->getClientMimeType();
            $upload->path = $filePath;
            $upload->save();
        }

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
