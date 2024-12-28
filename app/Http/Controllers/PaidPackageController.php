<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaidPackage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PaidPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = PaidPackage::all();
        return view('admin.PaidPackage.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.PaidPackage.createPackage');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'package_name' => 'required|string|max:255',
            'url' => 'required',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric|min:0',
            'gst_rate' => 'required|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow images up to 2MB
        ];
        $messages = [
            'package_name.required' => 'The package name is required.',
            'url.required' => 'The package URL is required.',
            'base_price.required' => 'The base price is required.',
            'gst_rate.required' => 'The GST rate is required.',
            'image.image' => 'The uploaded file must be an image.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/paid_package/'), $uniqueName);
            $imagePath = $uniqueName;
        }
        PaidPackage::create([
            'package_name' => $request->input('package_name'),
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'base_price' => $request->input('base_price'),
            'gst_rate' => $request->input('gst_rate'),
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Paid package created successfully!');
    }

    public function show(string $id)
    {
       $paidPackage = PaidPackage::findOrFail($id);
       return view('admin.PaidPackage.showPackage', compact('paidPackage'));
    }

    public function edit(string $id)
    {
        $package = PaidPackage::findOrFail($id);
       return view('admin.PaidPackage.editPackage', compact('package'));
    }

    public function update(Request $request, string $id)
    {
        $paidPackage = PaidPackage::findOrFail($id);
        $rules = [
            'package_name' => 'required|string|max:255',
            'url' => 'required',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric|min:0',
            'gst_rate' => 'required|numeric|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $imagePath = $paidPackage->image; // Keep the existing image path
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('image')->move(public_path('images/paid_package/'), $uniqueName);
            $imagePath = $uniqueName;
        }
        $paidPackage->update([
            'package_name' => $request->input('package_name'),
            'url' => $request->input('url'),
            'description' => $request->input('description'),
            'base_price' => $request->input('base_price'),
            'gst_rate' => $request->input('gst_rate'),
            'image' => $imagePath,
            'updated_at' => now(),
        ]);
        return redirect()->back()->with('success', 'Paid package updated successfully!');
    }

    public function destroy(string $id)
    {
        $package = PaidPackage::findOrFail($id);
        $package->delete();
        return redirect()->back()->with('success', 'Paid package deleted successfully!');
    }
}
