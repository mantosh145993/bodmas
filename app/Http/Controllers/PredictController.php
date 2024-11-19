<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category\Category;
// use App\Models\Rank_cutoff;
use App\Models\Medical;
use App\Models\Course;
use DB;

class PredictController extends Controller
{

    // public function college(Request $request)
    // {
    //     // Validate the input data
    //     // dd($request->all());
    //     $validatedData = $request->validate([
    //         'category' => 'required|string',
    //         'round' => 'required|integer',
    //         'rank' => 'required|integer',
    //         'course' => 'required|string',
    //         'quota' => 'required|integer',
    //         'state' => 'required|integer',
    //         'category' => 'required|integer',
    //         'subcategory' => 'required|integer',
    //     ]);

    //     $course = $validatedData['course'];
    //     $category = $validatedData['category'];  // e.g. "OPEN"
    //     $rank = $validatedData['rank'];  // e.g. "44"
    //     $round = $validatedData['round'];
    //     $state = $validatedData['state'];
    //     $category = $validatedData['category'];
    //     $subcategory = $validatedData['subcategory'];

    //     // Enable query log for debugging
    //     // DB::enableQueryLog();
    //     $lowerRank = (int)$rank - 100;
    //     $upperRank = $rank + 200;

    //     $rankCutoffs = Medical::where('course', $course)
    //         ->where('round', $round)
    //         ->whereRaw("FIND_IN_SET(?, category) > 0", [$category])
    //         ->whereBetween('rank', [$lowerRank, $upperRank])
    //         ->limit(7)
    //         ->get();
    //     // dd(DB::getQueryLog(), $rankCutoffs);
    //     // If no records are found, return an error
    //     if ($rankCutoffs->isEmpty()) {
    //         return response()->json([
    //             'success' => false,
    //             'error' => 'No colleges found for the specified rank and category.',
    //         ]);
    //     }

    //     // Debugging: Log the query
    //     // dd(DB::getQueryLog(), $rankCutoffs);
    //     return response()->json([
    //         'success' => true,
    //         'predictions' => $rankCutoffs,  // Return the filtered data with only selected category and rank
    //     ]);
    // }

    public function college(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'course' => 'required|string',
            'round' => 'required|integer',
            'rank' => 'required|integer',
            'quota' => 'required|integer',
            'state' => 'required|integer',
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
        ]);

        $course = $validatedData['course'];
        $round = $validatedData['round'];
        $rank = $validatedData['rank'];
        $state = $validatedData['state'];
        $categoryId = $validatedData['category'];
        $subcategoryId = $validatedData['subcategory'];

        $category = Category::where('id', $categoryId)->value('name');
        $subcategory = Category::where('id', $subcategoryId)->value('name');
// dd($subcategory);
        if (!$category || !$subcategory) {
            return response()->json([
                'success' => false,
                'error' => 'Invalid category or subcategory ID provided.',
            ]);
        }
//    DB::enableQueryLog();
        $lowerRank = max(0, $rank - 100); 
        $upperRank = $rank + 200;
        $rankCutoffs = Medical::where('course', $course)
        ->where('round', $round)
        ->where('state_id', $state)
        // ->whereIn('category', [$category, $subcategory]) 
        ->whereBetween('rank', [$lowerRank, $upperRank])
        ->limit(7)
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
}
