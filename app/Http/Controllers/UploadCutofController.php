<?php

namespace App\Http\Controllers;
use App\Models\Medical;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CutoffImport;
use App\Exports\CutoffExport;
use Illuminate\Http\Request;

class UploadCutofController extends Controller
{
    public function index(){
        $medicals = Medical::paginate(10);
        return view('admin.cutoff', compact('medicals'));
    }

    
    public function upload(Request $request){
        // dd($request->all());
        Excel::import(new CutoffImport, $request->file('file'));
        return back()->with('success', 'Users imported successfully.');
    }

    public function export(){
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
