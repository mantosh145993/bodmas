<?php

namespace App\Http\Controllers;

use App\Models\Medical;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CutoffImport;
use App\Exports\CutoffExport;
use Illuminate\Http\Request;

class UploadCutofController extends Controller
{
    public function index()
    {
        $medicals = []; // Initialize empty array

        Medical::orderBy('college_id', 'desc')->chunk(1000, function ($chunkedMedicals) use (&$medicals) {
            foreach ($chunkedMedicals as $medical) {
                $medicals[] = $medical; // Collect data
            }
        });

        return view('admin.cutoff', compact('medicals'));
    }

    // public function upload(Request $request){
    //     Excel::import(new CutoffImport, $request->file('file'));
    //     return back()->with('success', 'Users imported successfully.');
    // }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);
        // Import the Excel file
        Excel::import(new CutoffImport, $request->file('file'));
        return back()->with('success', 'Users imported successfully.');
    }

    public function export()
    {
        return Excel::download(new CutoffExport, 'cutoff.xlsx');
    }

    public function fetchMedicalData(Request $request)
    {
        $medicals = Medical::paginate(15);
        if ($request->ajax()) {
            return view('admin.medical_data', compact('medicals'))->render();
        }
        return view('admin.cutoff', compact('medicals'));
    }
}