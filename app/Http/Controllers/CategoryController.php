<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\State;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::orderBy('id','desc')->paginate(10); // Get 10 records per page
        return view('admin.category.list_category', compact('data'));
    }

    public function createCategories()
    {
        $categories = Category::select('id', 'name', 'parent_id')->distinct()->get();
        $states = State::all();
        return view('admin.category.add_category', compact('categories','states'));
    }

    public function storeCategories(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'type' => 'required'
        ]);
    
        // Check for duplicate category name
        $duplicate = Category::where('name', $request->input('name'))->first();
        if ($duplicate) {
            return response()->json([
                'errors' => [
                    'name' => ['Category name already exists!']
                ]
            ], 400);
        }
    
        // Create a new category instance
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->type = $request->input('type');
        $category->state_id = $request->input('state_id');
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/category'), $uniqueName);
            $category->image = $uniqueName;
        }
    
        // Save the category
        $category->save();
    
        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully!',
            'category' => $category
        ]);
    }
    

    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::select('id', 'name', 'parent_id')->distinct()->get();
        return view('admin.category.edit_category', compact('category', 'categories'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
             'type' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');
        $category->type = $request->input('type');

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/category'), $uniqueName);
            $category->image = $uniqueName;
        }

        $category->save();

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully!',
            'category' => $category
        ]);
    }

    public function destroyCategory($id) {
        $category = Category::findOrFail($id);
        // Storage::disk('public')->delete($banner->image); // Delete the image file
        $category->delete();
        return redirect()->route('list_category.list')->with('success', 'Category deleted successfully.');

    }

    public function updateCategoryPermission(Request $request,$id){
        $validated = $request->validate([
            'is_active' => 'required|boolean',
        ]);
        $category = Category::findOrFail($id);
        $category->is_active = $validated['is_active'];
        $category->save();
        return response()->json(['message' => 'Status updated successfully.']);
    }

    // / Fetch categories based on quota
    public function getCategories(Request $request)
    {
        // dd($request->all());
        $categories = [];
        $categories = Category::where('type', '1')
        ->whereNull('parent_id')
        ->get();
        return response()->json(['categories' => $categories]);
    }

    public function getSubcategories(Request $request)
    {
        // dd($request->all());
        $categoryId = $request->get('category_id');
        $state = $request->get('state');
        $subcategories = [];
        if ($categoryId) {
            $subcategories = Category::where('parent_id', $categoryId)->where('state_id',$state)->get();
        }
        return response()->json(['subcategories' => $subcategories]);
    }

    public function getStates()
    {
        $states = State::all();
        return response()->json(['states' => $states]);
    }
}
