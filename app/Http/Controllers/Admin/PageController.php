<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\State;
use App\Models\Course;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('id','desc')->get();
        return view('admin.page.page_list', compact('pages'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $states = State::all();
        $courses = Course::all();
        return view('admin.page.page_edit', compact('page','states','courses'));
    }

    public function view($id)
    {
        // echo "HHEETRFY";die;
        $page =  Page::findOrFail($id);
        return view('admin.page.page_view', compact('page'));
    }
    

    public function create()
    {
        $courses = Course::all();
        $states = State::all();
        return view('admin.page.page_add',compact('states','courses'));
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'published' => 'boolean'
    //     ]);
    //     $slug = Str::slug($validatedData['title']);
    //     $page = new Page();
    //     $page->title = $validatedData['title'];
    //     $page->content = $validatedData['content'];
    //     $page->slug = $slug;
    //     $page->course_id = $request->course_id;
    //     $page->state_id = $request->state_id;
    //     $page->published = $validatedData['published'] ?? false; 
    //     $page->save();
    //     return response()->json(['message' => 'Page created successfully.', 'page' => $page]);
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published' => 'boolean',
            'course_id' => 'nullable|exists:courses,id',
            'state_id' => 'nullable|exists:states,id',
        ]);

        // Generate slug from title
        $slug = Str::slug($validatedData['title']);

        // If both course_id and state_id are provided, create a hierarchical slug
        if ($request->course_id && $request->state_id) {
            $course = Course::find($request->course_id);
            $state = State::find($request->state_id);

            if ($course && $state) {
                $courseSlug = Str::slug($course->title); // Convert course name to slug
                $stateSlug = Str::slug($state->name);   // Convert state name to slug
                $slug = "{$courseSlug}/{$stateSlug}/{$slug}";
            }
        }

        // Create a new Page
        $page = new Page();
        $page->title = $validatedData['title'];
        $page->content = $validatedData['content'];
        $page->slug = $slug;
        $page->course_id = $request->course_id;
        $page->state_id = $request->state_id;
        $page->hierarchy = $request->hierarchy;
        $page->published = $validatedData['published'] ?? false;
        $page->save();

        return response()->json(['message' => 'Page created successfully.', 'page' => $page]);
    }

    // public function update(Request $request, $id)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string'
    //     ]);
    //     $slug = Str::slug($request->title);
    //     $page = Page::findOrFail($id);
    //     $page->title = $validatedData['title'];
    //     $page->content = $validatedData['content'];
    //     $page->published = $request->has('published');
    //     $page->course_id = $request->course_id;
    //     $page->slug=  $slug;
    //     $page->save();
    //   return redirect()->back()->with('success', 'Page updated successfully!');
    // }

    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'course_id' => 'nullable|exists:courses,id',
        'state_id' => 'nullable|exists:states,id',
        'published' => 'boolean'
    ]);

    // Find the page
    $page = Page::findOrFail($id);

    // Generate slug from title
    $slug = Str::slug($validatedData['title']);

    // If both course_id and state_id are provided, create a hierarchical slug
    if ($request->course_id && $request->state_id) {
        $course = Course::find($request->course_id);
        $state = State::find($request->state_id);

        if ($course && $state) {
            $courseSlug = Str::slug($course->title); // Convert course name to slug
            $stateSlug = Str::slug($state->name);   // Convert state name to slug
            $slug = "{$courseSlug}/{$stateSlug}/{$slug}";
        }
    }

    // Update page details
    $page->title = $validatedData['title'];
    $page->content = $validatedData['content'];
    $page->slug = $slug; 
    $page->course_id = $request->course_id;
    $page->state_id = $request->state_id;
    $page->hierarchy = $request->hierarchy;
    $page->published = $validatedData['published'] ?? false;
    $page->save();

    return redirect()->back()->with('success', 'Page updated successfully!');
}
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->route('pages.pages_list')->with('success', 'Page deleted successfully!');
    }
}
