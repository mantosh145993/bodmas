<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryEvent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class GalleryController extends Controller
{
    public function index(){
    $events = GalleryEvent::all();
    return view('admin.gallery.index', compact('events'));
    }

    public function show($id){
        $events = GalleryEvent::find($id);
        if (!$events) {
            abort(404, 'Event not found.');
        }
        return view('admin.gallery.show',compact('events'));
    }

    public function add(){
      return view('admin.gallery.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow images up to 2MB
        ];
        $messages = [
            'title.required' => 'The package title is required.',
            'description.required' => 'The package description is required.',
            'image.image' => 'The uploaded file must be an image.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/events/'), $uniqueName);
            $imagePath = $uniqueName;
        }
        GalleryEvent::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'image_url' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Events created successfully!');
    }

    public function edit($id){
        $events = GalleryEvent::find($id);
        if (!$events) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        return view('admin.gallery.update',compact('events'));
    }

    public function update(Request $request, $id)
    {
        $event = GalleryEvent::find($id);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    
        $messages = [
            'title.required' => 'The event title is required.',
            'image.image' => 'The uploaded file must be an image.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/events/'), $uniqueName);
    
            // Delete the old image if it exists
            if ($event->image_url && file_exists(public_path('images/events/' . $event->image_url))) {
                unlink(public_path('images/events/' . $event->image_url));
            }
            $event->image_url = $uniqueName;
        }
        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
        return redirect()->route('gallery.gallery_list')->with('success', 'Event updated successfully.');
    }
    
    public function destroy($id){
        $events = GalleryEvent::find($id);
        if (!$events) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        $events->delete();
        return redirect()->route('gallery.gallery_list')->with('success', 'Event deleted successfully.');
    }
}
