<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\College;
use App\Models\Medical;
use App\Models\Predictor;
use App\Models\Course;
use App\Models\Page;
use DB;

class PredictController extends Controller
{

    public function college(Request $request)
    {
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

        DB::enableQueryLog();

        // Fetch category and subcategory names in a single query
        $categories = Category::whereIn('id', [$categoryId, $subcategoryId])
            ->pluck('name')
            ->filter() // Remove null values
            ->toArray();

        // Calculate rank range
        $lowerRank = floor($rank - ($rank * 4 / 100));
        $upperRank = ceil($rank + ($rank * 2 / 100));
        // Define budget ranges
        $budgetRanges = [
            '100000' => [0, 100000], // Less than 1 lakh
            '400000' => [200000, 400000], // 2 to 4 lakh
            '800000' => [400000, 800000], // 4 to 8 lakh
            '1200000' => [800000, 1200000], // 8 to 12 lakh
            '1800000' => [1200000, 1800000], // 12 to 18 lakh
            '2400000' => [1800000, 2400000], // 18 to 24 lakh
            '3000000' => [2400000, 3000000], // 24 to 30 lakh
            '9000000' => [3000000, 10000000], // Above 30 lakh
        ];
        // Query to fetch rank cutoffs
        $rankCutoffs = Medical::where('course', $course)
            ->whereIn('category', $categories) // Use whereIn for category
            ->where('rank', '>=', $lowerRank)
            ->when(!empty($budget), function ($query) use ($budget, $budgetRanges) {
                if (isset($budgetRanges[$budget])) {
                    [$min, $max] = $budgetRanges[$budget];
                    if ($max === null) {
                        $query->where('fee', '<', $min); // Filter by budget (less than min)
                    } else {
                        $query->whereBetween('fee', [$min, $max]); // Filter by budget range
                    }
                }
            })
            ->whereBetween('rank', [$lowerRank, $upperRank]) // Filter by rank range after budget
            ->orderBy('rank','desc')
            ->limit(15)
            ->get();

        // dd(DB::getQueryLog(), count($rankCutoffs));
        if ($rankCutoffs->isEmpty()) {
            return response()->json([
                'success' => false,
                'error' => 'No colleges found for the specified rank and budget.',
            ]);
        }
        return response()->json([
            'success' => true,
            'predictions' => $rankCutoffs,
        ]);
    }

    public function getCollegesByState(Request $request)
    {
        $stateId = $request->input('state_id');
        $courseId = $request->input('course_id');
        $type = $request->input('type');
        $query = College::query();

        if ($stateId) {
            $query->where('state_id', $stateId);
        }
        if ($courseId) {
            $query->where('course_id', $courseId);
        }
        if ($type) {
            $query->where('type', $type);
        }

        $colleges = $query->get();
        if ($colleges->isNotEmpty()) {
            $pageIds = $colleges->pluck('page_id')->unique(); // Get unique page IDs
            $pages = Page::whereIn('id', $pageIds)->get();    // Retrieve all matching pages
        } else {
            dd('No colleges found');
        }
        $courses = Course::all();

        return response()->json([
            'colleges' => $colleges,
            'courses' => $courses,
            'pages' => $pages
        ]);
    }

    public function predictor()
    {
        $predictors = Predictor::paginate(10);
        return view('admin.predictor_lead', compact('predictors'));
    }
}
