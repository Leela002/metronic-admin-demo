<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Illuminate\Support\Facades\Mail;
use Request;

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

    public function index()
    {
        $categories = Category::all();
        return view('master_data.category.index', ['categories' => $categories]);
    }

    public function create(): View
    {
        return view('master_data.category._create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $requestData = $request->all();
        $requestData['created_by'] = Auth::user()->name;
        // Handle file upload
        if ($request->hasFile('upload_icon')) {
            $file = $request->file('upload_icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/icons'), $filename);  // Save file in 'public/uploads/icons' directory
            $requestData['upload_icon'] = $filename;
        }
        Category::create($requestData);

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
