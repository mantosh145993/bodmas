<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10);
        return view('admin.page.page_list', compact('pages'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.page.page_edit', compact('page'));
    }

    public function view($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('admin.page.page_view', compact('page'));
    }

    public function create()
    {
        return view('admin.page.page_add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        DB::enableQueryLog();
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (Page::where('slug', $slug)->exists()) {
            // Append counter to the slug if it already exists
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        $pages = Page::create(array_merge($validatedData, [
            'slug' => $slug,
            'published' => $request->has('published') 
        ]));

        // Print the last query and its bindings

        // $queries = DB::getQueryLog();
        // $lastQuery = end($queries);
        // print_r($lastQuery['query']);
        // print_r($lastQuery['bindings']); 
        // dd($lastQuery['bindings']);
        return response()->json(['message' => 'Page created successfully.', 'post' => $pages]);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published' => 'boolean'
        ]);
        $slug = Str::slug($request->title);
        $page = Page::findOrFail($id);
        $page->title = $validatedData['title'];
        $page->content = $validatedData['content'];
        $page->published = $request->has('published');
        $page->slug=  $slug;
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
