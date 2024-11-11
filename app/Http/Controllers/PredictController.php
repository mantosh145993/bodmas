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

    public function college(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'category' => 'required|string',
            'round' => 'required|integer',
            'rank' => 'required|integer',
            'course' => 'required|string',
        ]);

        $course = $validatedData['course'];
        $category = $validatedData['category'];  // e.g. "OPEN"
        $rank = $validatedData['rank'];  // e.g. "44"
        $round = $validatedData['round'];

        // Enable query log for debugging
        // DB::enableQueryLog();
        $lowerRank = (int)$rank - 100;
        $upperRank = $rank + 200;

        $rankCutoffs = Medical::where('course', $course)
            ->where('round', $round)
            ->whereRaw("FIND_IN_SET(?, category) > 0", [$category])
            ->whereBetween('rank', [$lowerRank, $upperRank])
            ->limit(7)
            ->get();
        // dd(DB::getQueryLog(), $rankCutoffs);
        // If no records are found, return an error
        if ($rankCutoffs->isEmpty()) {
            return response()->json([
                'success' => false,
                'error' => 'No colleges found for the specified rank and category.',
            ]);
        }

        // Debugging: Log the query
        // dd(DB::getQueryLog(), $rankCutoffs);
        return response()->json([
            'success' => true,
            'predictions' => $rankCutoffs,  // Return the filtered data with only selected category and rank
        ]);
    }

}
