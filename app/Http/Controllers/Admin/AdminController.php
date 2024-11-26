<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

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
        $categories = Category::where('type', '4')->get();
        return view('admin.blog-add', ['categories' => $categories]);
    }

    public function storeBlog(Request $request)
    {
        // dd($request->all()); 
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|numeric',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'meta_title' => 'required|string',
            'meta_keywords' => 'required|string',
            'meta_description' => 'required|string',
            'tags' => 'required|string',
            'author' => 'required|string',
            'author_description' => 'required|string',
            'feature_description' => 'required|string',

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
            'status' => $request->input('status', Post::STATUS_DRAFT),
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

    public function updatePermissionBlog(Request $request, $id)
    {
        $validated = $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $post = Post::findOrFail($id);
        $post->is_active = $validated['is_active'];
        $post->status = ['status' => Post::STATUS_PUBLISHED];
        $post->published_at = now();
        $post->save();

        return response()->json(['message' => 'Status updated successfully.']);
    }


    public function viewBlog($id)
    {
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
            'author' => 'required|string',
            'feature_description' => 'required|string'
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


    public function autoSave(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        // Check if there's an existing draft (could track via user or session)
        $post = Post::firstOrNew([
            'user_id' => Auth::user()->id,
            'status' => Post::STATUS_DRAFT,
        ]);

        // Update or create the draft
        $post->fill([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => Post::STATUS_DRAFT,
        ]);
        $post->save();

        return response()->json(['success' => true, 'post_id' => $post->id]);
    }


    /**
     * Blog end.
     */


    ///  Admin Role 
    public function updateRole(Request $request, $id)
    {
        // dd($request);
        $validated = $request->validate([
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->role = $validated['role'];
        $user->save();

        return response()->json(['success' => true]);
    }


}
