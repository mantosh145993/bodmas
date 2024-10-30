<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageBannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.list_banner', compact('banners'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('admin.banner.add_banner', ['pages' => $pages]); // Create this view
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'is_active' => 'boolean',
            'order_index' => 'integer|min:0',
        ]);

        $uniqueName = null;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/banner'), $uniqueName);
        }

        Banner::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $uniqueName,
            'link' => $validatedData['link'],
            'is_active' => $validatedData['is_active'],
            'order_index' => $validatedData['order_index'],
            'page_id' => $request->page_id
        ]);

        // Check if the request was made via AJAX
        if ($request->ajax()) {
            return response()->json(['success' => 'Banner created successfully.']);
        }
    }


    public function edit($id)
    {
        $pages = Page::all();
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit_banner', compact('banner', 'pages'));
    }

    // Update the specified banner in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'is_active' => 'boolean',
            'order_index' => 'integer|min:0',
        ]);
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/banner'), $uniqueName);
            $banner->image = $uniqueName;
        }
    
        // Update other banner attributes
        $banner->title = $validatedData['title'];
        $banner->description = $validatedData['description'];
        $banner->link = $validatedData['link'];
        $banner->is_active = $validatedData['is_active'];
        $banner->order_index = $validatedData['order_index'];
        $banner->page_id = $request->page_id;
    
        // Save the changes
        $banner->save();
    
        // Check if the request was made via AJAX
        if ($request->ajax()) {
            return response()->json(['success' => 'Banner updated successfully.']);
        } else {
            return redirect()->route('banner.page')->with('success', 'Banner updated successfully.');
        }
    }
    
    public function view($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.view_banner', compact('banner'));
    }


    // Remove the specified banner from storage
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        Storage::disk('public')->delete($banner->image); // Delete the image file
        $banner->delete();

        return redirect()->route('banner.page')->with('success', 'Banner deleted successfully.');
    }
}
