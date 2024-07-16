<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Illuminate\Support\Facades\Mail;

class CategoryController extends Controller
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
        $categories = Category::paginate($perPage);
        return view('master_data.category.index', compact('categories', 'perPage'));
    }

    public function create(): View
    {
        return view('master_data.category._create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->name;

        $category = Category::create($requestData);
        
        // Handle file upload
        if ($request->hasFile('upload_icon')) {
            $file = $request->file('upload_icon');
    
            // Ensure the file was uploaded correctly
            if ($file->isValid()) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/icons/' . $filename;
                $file->move(public_path('uploads/icons'), $filename);  // Save file in 'public/uploads/icons' directory
                $requestData['upload_icon'] = $filename;
    
                // Get the file size after moving it
                $fileSize = filesize(public_path('uploads/icons/' . $filename));
    
                $upload = new Upload();
                $upload->name = $filename;
                $upload->size = $fileSize; // Use the previously obtained file size
                $upload->type = $file->getClientMimeType();
                $upload->path = $filePath;
                $upload->ref_id = $category->id;
                $upload->module = 'Category';
                $upload->save();
            } else {
                return redirect()->back()->withErrors(['upload_icon' => 'File upload failed. Please try again.']);
            }
        }
        
        
    
        return redirect()->route('category.index')
            ->with('success', 'Category created successfully.');
    }    

    public function edit(Category $id): View
    {
        $category = Category::select()->where('id', $id->id)->first();
        return view('master_data.category._update', compact('id', 'category'));
    }

    public function update(UpdateCategoryRequest $request, $id): RedirectResponse
    {
        $requestData = $request->all();
        $requestData['updated_by'] = Auth::user()->name;
    
        // Find the record by its ID
        $category = Category::find($id);
        if ($category) {
            // Update the record
            $category->update($requestData);
    
            return redirect()->route('category.index')
                ->with('success', 'Category updated successfully.');
        }
    
        return redirect()->route('category.index')
            ->with('error', 'Category not found.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
    
        if($category) {
            $category->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
