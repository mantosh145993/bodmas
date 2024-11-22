<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Str;
use App\Models\Category\Category;
use App\Models\Post;

class PackageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $packages = Package::paginate(6);
        return view('admin.Package.index', compact('packages', 'categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'sale_price' => 'required|numeric|min:0',
            'ragular_price' => 'required|numeric|min:0',
        ]);
        $uniqueName = null;
        if ($request->hasFile('images')) {
            $extension = $request->file('images')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('images')->move(public_path('images/package'), $uniqueName);
        }
        $package = Package::create([
            'product_name' => $request->product_name,
            'images' => $uniqueName,
            'description' => $request->description,
            'sale_price' => $request->sale_price,
            'ragular_price' => $request->ragular_price,
            'category' => $request->category
        ]);

        return response()->json(['package' => $package]);
    }

    public function show(string $id)
    {
        $package = Package::find($id);
        if (!$package) {
            return response()->json([
                'message' => 'Package not found.'
            ], 404);
        }
        return response()->json([
            'package' => $package
        ]);
    }

    public function edit(string $id)
    {
        $package = Package::find($id);
        if (!$package) {
            return response()->json([
                'message' => 'Package not found.'
            ], 404);
        }
        return response()->json([
            'package' => $package
        ]);
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'sale_price' => 'required|numeric|min:0',
            'ragular_price' => 'nullable|numeric|min:0',
            'category' => 'required|exists:categories,id'
        ]);
        $package = Package::find($id);
        if (!$package) {
            return response()->json(['message' => 'Package not found.'], 404);
        }
        $package->product_name = $request->input('product_name');
        $package->description = $request->input('description');
        $package->sale_price = $request->input('sale_price');
        $package->ragular_price = $request->input('ragular_price');
        $package->category = $request->input('category');
        $uniqueName = null;
        if ($request->hasFile('images')) {
            $extension = $request->file('images')->getClientOriginalExtension();
            $uniqueName = Str::uuid() . '.' . $extension;
            $request->file('images')->move(public_path('images/package'), $uniqueName);
            $package->images = $uniqueName;
        }
        $package->save();
        return response()->json([
            'message' => 'Package updated successfully',
            'package' => $package
        ]);
    }



    public function destroy(string $id)
    {
        $package = Package::find($id);
        if (!$package) {
            return response()->json(['message' => 'Package not found.'], 404);
        }
        if ($package->image && file_exists(public_path('images/package/' . $package->image))) {
            unlink(public_path('images/package/' . $package->image));
        }
        $package->delete();
        return response()->json(['message' => 'Package deleted successfully.'], 200);
    }

    public function getPackagesByCategory($id)
    {
        $categoryId =$id;
        $packages = $categoryId ? Package::where('category', $categoryId)->get() : Package::all();
        return response()->json(['packages' => $packages]);
    }

}
