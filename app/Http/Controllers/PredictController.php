<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\College;
use App\Models\Medical;
use App\Models\Predictor;
use DB;

class PredictController extends Controller
{

    public function college(Request $request)
    {
// dd($request->all());
        // store information from predictor
        $predictor = new Predictor();
        $predictor->name = $request->name;
        $predictor->number = $request->number;
        $predictor->rank = $request->rank;
        $predictor->state = $request->state;
        $predictor->course = $request->course;
        $predictor->budget = $request->budget;
        // $predictor->save();
        // dd($request->name);

        $course = $request->course;
        $rank = $request->rank;
        $state = $request->state;
        $categoryId = $request->category;
        $subcategoryId = $request->subcategory;
        $budget = $request->budget;
        if (!empty($budget)) {
            $budgetFrom = $budget / 2;
            $budgetTo = $budget;
        }
        DB::enableQueryLog();
        $category = Category::where('id', $categoryId)->value('name');
        $subcategory = Category::where('id', $subcategoryId)->value('name');
        
        $lowerRank = ($rank * 5 / 100 - $rank);
        $upperRank = ($rank * 10 / 100 + $rank);
        
        $rankCutoffs = Medical::where('course', $course)
            // ->where('state_id', $state) // Uncomment if needed
            ->whereIn('category', [$category, $subcategory]) // Filter by category
            ->when(!empty($budget), function ($query) use ($budgetFrom, $budgetTo) {
                $query->whereBetween('fee', [$budgetFrom, $budgetTo]); // Budget range filter
            })
            ->where(function ($query) use ($rank, $lowerRank, $upperRank) {
                $query->whereBetween('rank', [$lowerRank, $upperRank])
                    ->orWhereIn('rank', [$rank]);
            })
            ->get();        

        dd(DB::getQueryLog(), $rankCutoffs);
        if ($rankCutoffs->isEmpty()) {
            return response()->json([
                'success' => false,
                'error' => 'No colleges found for the specified rank and category.',
            ]);
        }

        return response()->json([
            'success' => true,
            'predictions' => $rankCutoffs,
        ]);
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
