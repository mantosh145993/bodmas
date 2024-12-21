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
use App\Models\College;
use App\Models\Page;
use App\Models\Menu;
use App\Models\Notice;
use App\Models\PaidPackage;
use App\Models\Predictor;
use App\Models\Medical;
use function PHPSTORM_META\type;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Dashboard(){
        $collegeCount = College::count();
        $pageCount = Page::count();
        $menuCount = Menu::count();
        $noticeCount = Notice::count();
        $paidPackageCount = PaidPackage::count();
        $predictorCount = Predictor::count();
        $blogCount = Post::count();
        $cutOffCount = Medical::count();
        return view('admin.index',
        [
            'collegeCount' =>$collegeCount,
            'pageCount' => $pageCount,
            'menuCount' => $menuCount,
            'noticeCount' => $noticeCount,
            'paidPackageCount' =>$paidPackageCount,
            'predictorCount' =>$predictorCount,
            'blogCount' => $blogCount,
            'cutOffCount' => $cutOffCount
        ]
    );
    }
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

    public function updateRole(Request $request, $id)
    {
        $validated = $request->validate([
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->role = $validated['role'];
        $user->save();

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

    public function autoSave(Request $request)
    {
        // dd($request->all());
        try {
            if ($request->tagsField) {
                $tags = explode(',', $request->tagsField); // Split the tags by comma
                $all_tags = json_encode($tags); // Store tags as a JSON array
            } else {
                $all_tags = null; // Handle the case when no tags are provided
            }
            // Handle feature image upload
            if ($request->hasFile('feature_image')) {
                $originalName = $request->file('feature_image')->getClientOriginalName();
                $fileName = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $request->file('feature_image')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                $request->file('feature_image')->move(public_path('images/feature'), $fileName);
            } else {
                $fileName = null; // Default to null if no file is uploaded
            }
    
            // Validate the request data
            $validated = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'tags' =>$all_tags,
                'content' => $request->content,
                'excerpt' => $request->excerpt,
                'category_id' => $request->category_id,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'published_at' => $request->published_at,
                'is_active' => $request->is_active,
                'feature_description' => $request->feature_description,
                'author' => $request->author,
                'author_description' => $request->author_description,
            ];
            // Find or create the draft
            $post = Post::firstOrNew([
                'user_id' => Auth::id(),
                'status' => 'draft',
            ]);
    
            // Update fields and save
            $post->fill($validated);
    
            // Only update the feature_image if a new one is uploaded
            if ($fileName) {
                $post->feature_image = $fileName;
            }
    
            $post->save();
    
            return response()->json(['success' => true, 'post_id' => $post->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function storeBlog(Request $request)
    {
        $all_tags ='';
        // dd($request->tagsField);
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
            'author' => 'required|string',
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

        if ($request->tagsField) {
            $tags = explode(',', $request->tagsField); // Split the tags by comma
            $all_tags = json_encode($tags); // Store tags as a JSON array
        } else {
            $all_tags = null; // Handle the case when no tags are provided
        }

        $post = Post::create(array_merge($validatedData, [
            'slug' => Str::slug($request->title),
            'feature_image' => $fileName,
            'status' => $request->input('status', Post::STATUS_DRAFT),
            'is_active' => 1,
            'tags' => $all_tags,
            'published_at' => now()
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
        $categories = Category::where('type', '4')->get();
        return view('admin.blog-view', compact('post','categories'));
    }

    public function editBlog($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::where('type', '4')->get();
        return view('admin.blog-edit', compact('post','categories'));
    }

    public function updateBlog(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $id,
            'content' => 'required|string',
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
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'tags'=> $request->tags,
            'category_id' => $request->category_id
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
