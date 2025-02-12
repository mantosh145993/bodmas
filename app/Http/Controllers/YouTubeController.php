<?php

namespace App\Http\Controllers;

use App\Models\YouTubeVideo;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    public function index()
    {
        $videos = YouTubeVideo::latest()->get();
        return view('admin.youTube.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.youTube.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video_id' => 'required|string|unique:youtube_videos,video_id',
            'description' => 'nullable|string',
        ]);

        YouTubeVideo::create($request->all());

        return redirect()->route('youtube.vedio_list')->with('success', 'Video added successfully!');
    }

    public function destroy($id) {
        $video = YouTubeVideo::findOrFail($id);
        $video->delete();
    
        return redirect()->route('youtube.vedio_list')->with('success', 'Video deleted successfully!');
    }
}
