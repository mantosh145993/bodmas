<?php

namespace App\Http\Controllers;

use App\Models\SliderBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SliderBannerController extends Controller
{
    // Display a listing of the banners
    public function index()
    {
        $banners = SliderBanner::all();
        return view('admin.slider.slider_banners', compact('banners'));
    }

    public function create()
    {
        return view('admin.slider.slider_create_banner'); // Create this view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'is_active' => 'nullable|boolean',
            'order_index' => 'nullable|integer',
        ]);

        $uniqueName = null;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/slider_banner'), $uniqueName);
        }

        SliderBanner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $uniqueName,
            'link' => $request->link,
            'is_active' => $request->is_active ? 1 : 0,
            'order_index' => $request->order_index ?? 0,
        ]);

        // Check if the request was made via AJAX
        if ($request->ajax()) {
            return response()->json(['success' => 'Banner created successfully.']);
        }
    }


    // Show the form for editing the specified banner
    public function edit($id)
    {
        $banner = SliderBanner::findOrFail($id);
        return view('admin.slider.edit_slider_banner', compact('banner')); // Create this view
    }

    // Update the specified banner in storage
    public function update(Request $request, $id)
    {
        try {
            $banner = SliderBanner::findOrFail($id);

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'link' => 'nullable|url',
                'is_active' => 'nullable|boolean',
                'order_index' => 'nullable|integer',
            ]);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'is_active' => $request->is_active ? 1 : 0,
                'order_index' => $request->order_index ?? 0,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                $originalName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
                $request->file('image')->move(public_path('images/slider_banner'), $fileName);
                $data['image'] = $fileName;
            }

            $banner->update($data);

            return redirect()->route('admin.banners')->with('success', 'Banner updated successfully.');
        } catch (\Exception $e) {
            // Handle the error and redirect back with an error message
            return redirect()->route('admin.banners')->with('error', 'An error occurred while updating the banner: ' . $e->getMessage());
        }
    }


    // Remove the specified banner from storage
    public function destroy($id)
    {
        $banner = SliderBanner::findOrFail($id);
        Storage::disk('public')->delete($banner->image); // Delete the image file
        $banner->delete();

        return redirect()->route('admin.banners')->with('success', 'Banner deleted successfully.');
    }
}
