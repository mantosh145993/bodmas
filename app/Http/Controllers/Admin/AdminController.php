<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Permission start.
     */
    public function Permission()
    {
        $data = User::all();
        return view('admin.permission', compact('data'));
    }


    public function updatePermission(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = $request->is_admin;
        $user->save();
        return response()->json(['success' => true]);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true]);
    }

    /**
     * Permission end.
     */


    /**
     * Blog start.
     */

    public function blog()
    {
        $data = Post::all();
        return view('admin.blog-list', compact('data'));
    }

    public function addBlogPage()
    {
        return view('admin.blog-add');
    }

    public function uploadBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:300', // Max size in KB
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        if ($request->hasFile('upload')) {
            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('images/posts'), $fileName);
            $url = asset('images/posts/' . $fileName);

            return response()->json([
                'FileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
        return response()->json([
            'error' => 'No file uploaded.'
        ], 400);
    }


    public function storeBlog(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handle the feature image upload if it exists
        if ($request->hasFile('feature_image')) {
            $originalName = $request->file('feature_image')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('feature_image')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('feature_image')->move(public_path('images/feature'), $fileName);
        } else {
            $fileName = null; // Default to null if no file is uploaded
        }
        DB::enableQueryLog();
        $post = Post::create(array_merge($validatedData, [
            'slug' => Str::slug($request->title),
            'feature_image' => $fileName,
        ]));

        // Print the last query and its bindings

        // $queries = DB::getQueryLog();
        // $lastQuery = end($queries);
        // print_r($lastQuery['query']);
        // print_r($lastQuery['bindings']); 
        // dd($lastQuery['bindings']);

        // Return a JSON response with the created post
        return response()->json(['message' => 'Post created successfully.', 'post' => $post]);
    }


    public function updatePermissionBlog(Request $request, $id)
    {
        $validated = $request->validate([
            'is_active' => 'required|boolean',
        ]);
    
        $post = Post::findOrFail($id);
        $post->is_active = $validated['is_active'];
        $post->save();
    
        return response()->json(['message' => 'Status updated successfully.']);
    }
    

    public function viewBlog($id){
        $post = Post::findOrFail($id);
        return view('admin.blog-view', compact('post'));
    }

    public function editBlog($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.blog-edit', compact('post'));
    }

    public function updateBlog(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
            'content' => 'required|string',
        ]);
        // Find the post to update
        $post = Post::findOrFail($id);
        $featureImage = $post->feature_image;
        if ($request->hasFile('feature_image')) {
            $originalName = $request->file('feature_image')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('feature_image')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('feature_image')->move(public_path('images/feature'), $fileName);
            $featureImage = $fileName;
        }
        // Update the post with validated data
        $post->update(array_merge($validatedData, [
            'slug' => Str::slug($request->title),
            'feature_image' => $featureImage,
        ]));
        return redirect()->route('admin.blog')->with('success', 'Post updated successfully.');
    }
    

    public function destroyBlog($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['success' => true]);
    }


    /**
     * Blog end.
     */
}
