<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\State;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::orderBy('id', 'desc')->paginate(20);
        $states = State::all();
        return view('admin.notice.index', compact('notices','states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|min:0',
            'description' => 'required|string'
        ]);
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('file')->move(public_path('notice/'), $uniqueName);
            $file = $uniqueName;
        }
        // dd(DB::getQueryLog(), $current_blogs);
        $notice = Notice::create(
            [
                'state_id' => $request->state_id,
                'type' => $request->type,
                'title' => $request->title,
                'description' => $request->description,
                'file' => $file
            ]
        );
        return response()->json([
            'message' => 'Notice Created successfully',
            'notice' => $notice
        ]);
    }

    public function show(string $id)
    {
        $states = State::all();
        $notice = Notice::find($id);
        if (!$notice) {
            return response()->json([
                'message' => 'notice not found.'
            ], 404);
        }
        return response()->json([
            'notice' => $notice,
            'states' => $states
        ]);
    }

    public function edit(string $id)
    {
        $notice = Notice::find($id);
        if (!$notice) {
            return response()->json([
                'message' => 'notice not found.'
            ], 404);
        }
        return response()->json([
            'notice' => $notice
        ]);
    }

    public function update(Request $request, string $id)
    {
        // DB::enableQueryLog();
        $request->validate([
            'type' => 'required|string|max:255',
            'title' => 'required|string|min:0',
            'description' => 'required|string'
        ]);
        // dd($request->all());
        $notice = Notice::find($id);
        if (!$notice) {
            return response()->json(['message' => 'Notice not found.'], 404);
        }
        $notice->state_id = $request->input('state_id');
        $notice->type = $request->input('type');
        $notice->title = $request->input('title');
        $notice->description = $request->input('description');
        $uniqueName = null;
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('file')->move(public_path('/notice'), $uniqueName);
            $notice->file = $uniqueName;
        }
        // dd(DB::getQueryLog(), $current_blogs);
        $notice->save();
        return response()->json([
            'message' => 'Notice updated successfully',
            'notice' => $notice
        ]);
    }

    public function destroy(string $id)
    {
        $notice = Notice::find($id);
        if (!$notice) {
            return response()->json(['message' => 'notice not found.'], 404);
        }
        if ($notice->image && file_exists(public_path('notice/' . $notice->file))) {
            unlink(public_path('notice/' . $notice->file));
        }
        $notice->delete();
        return response()->json(['message' => 'notice deleted successfully.'], 200);
    }
}
