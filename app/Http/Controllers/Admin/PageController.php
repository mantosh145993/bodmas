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
        $pages = Page::orderBy('id','desc')->get();
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published' => 'boolean'
        ]);
        $slug = Str::slug($validatedData['title']);
        $page = new Page();
        $page->title = $validatedData['title'];
        $page->content = $validatedData['content'];
        $page->slug = $slug;
        $page->published = $validatedData['published'] ?? false; 
        $page->save();
        return response()->json(['message' => 'Page created successfully.', 'page' => $page]);
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
