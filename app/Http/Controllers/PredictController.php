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
        // DB::enableQueryLog();
        $category = Category::where('id', $categoryId)->value('name');
        $subcategory = Category::where('id', $subcategoryId)->value('name');
        
        $lowerRank = ($rank * 5 / 100 - $rank);
        $upperRank = ($rank * 10 / 100 + $rank);
        
        $rankCutoffs = Medical::where('course', $course)
            ->whereIn('category', [$category, $subcategory]) // Filter by category
            ->when(!empty($budget), function ($query) use ($budget) {
                switch ($budget) {
                    case '100000': // Less than 1 lakh
                        $query->where('fee', '<', 100000);
                        break;
        
                    case '400000': // 2 to 4 lakh
                        $query->whereBetween('fee', [200000, 400000]);
                        break;
        
                    case '800000': // 4 to 8 lakh
                        $query->whereBetween('fee', [400000, 800000]);
                        break;
        
                    case '1200000': // 8 to 12 lakh
                        $query->whereBetween('fee', [800000, 1200000]);
                        break;
        
                    case '1800000': // 12 to 18 lakh
                        $query->whereBetween('fee', [1200000, 1800000]);
                        break;
        
                    case '2400000': // 18 to 24 lakh
                        $query->whereBetween('fee', [1800000, 2400000]);
                        break;
        
                    case '3000000': // 24 to 30 lakh
                        $query->whereBetween('fee', [2400000, 3000000]);
                        break;
        
                    case '9000000': // Above 30 lakh
                        $query->where('fee', '>', 3000000);
                        break;
                }
            })
            ->where(function ($query) use ($rank, $lowerRank, $upperRank) {
                $query->whereBetween('rank', [$lowerRank, $upperRank])
                    ->orWhere('rank', $rank);
            })
            ->get();           

        // dd(DB::getQueryLog(), $rankCutoffs);
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
