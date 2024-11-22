<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use App\Models\State;
use App\Models\Course;
use App\Models\Predictor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::paginate(6);
        $courses = Course::all();
        $states = State::all();
        return view('admin.college.index', ['colleges'=>$colleges,'courses'=>$courses,'states'=>$states]);
    }

    public function create()
    {
        $colleges = College::paginate(6);
        $courses = Course::all();
        $states = State::all();
        return view('admin.college.add', ['colleges'=>$colleges,'courses'=>$courses,'states'=>$states]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|numeric',
            'type' => 'required|string|min:0',
            'course_id' => 'required|numeric',
            'name'=> 'required|string|min:0',
            'address'=> 'required|string|',
        ]);
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('college/'), $uniqueName);
            $file = $uniqueName;
        }
        // dd(DB::getQueryLog(), $current_blogs);
        $notice = College::create(
            [
                'state_id' => $request->state_id,
                'type' => $request->type,
                'course_id' => $request->course_id,
                'image' => $file,
                'name' =>$request->name,
                'address' =>$request->address
            ]
        );
        return response()->json([
            'message' => 'College Created successfully',
            'college' => $notice
        ]);
    }
    public function destroy(string $id)
    {
        $college = College::find($id);
        if (!$college) {
            return response()->json(['message' => 'College not found.'], 404);
        }
        if ($college->image && file_exists(public_path('collge/' . $college->file))) {
            unlink(public_path('college/' . $college->file));
        }
        $college->delete();
        return response()->json(['message' => 'College deleted successfully.'], 200);
    }
    public function getCollegesByState(Request $request)
    {
        $colleges = College::where('state_id', $request->state_id)->get();
        return response()->json($colleges);
    }

    public function predictor(){
       $predictors = Predictor::paginate(10);
       return view('admin.predictor_lead' , compact('predictors'));
    }


}
