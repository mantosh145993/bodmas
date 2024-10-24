<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('children')->whereNull('parent_id')->orderBy('order')->get();
        return view('admin.menue.menu', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'required|integer',
            'parent_id' => 'nullable|integer|exists:menus,id',
        ]);

        $slug = $this->generateUniqueSlug($request->title);
        $menu = Menu::create([
            'title' => $request->title,
            'order' => $request->order,
            'parent_id' => $request->parent_id,
            'url' => $slug, // Save the generated unique slug in the 'url' field
        ]);

        return response()->json($menu, 201); // Return the created menu item as JSON
    }

    private function generateUniqueSlug($title)
    {
        // Generate the initial slug
        $slug = Str::slug($title);
        $count = Menu::where('url', 'like', "%/$slug%")->count();
        return $count ? "/{$slug}-{$count}" : "/{$slug}";
    }


    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:menus,id',
            'title' => 'required|string|max:255',
        ]);
        $menu = Menu::findOrFail($request->id);
        $slug = $this->generateUniqueSlug($request->title);
        $menu->update([
            'title' => $request->title,
            'url' => '/' . $slug, // Prepending '/' to the slug
        ]);
        return response()->json($menu, 200);
    }


    public function updateOrder(Request $request)
    {
        $menuData = $request->input('menu');

        foreach ($menuData as $menuItem) {
            Menu::where('id', $menuItem['id'])->update(['order' => $menuItem['order'], 'parent_id' => $menuItem['parent_id']]);
        }

        return response()->json(['success' => true]);
    }

    public function destroy(Menu $menu)
    {
        if ($menu->children()->count() > 0) {
            return response()->json(['error' => 'Cannot delete a menu with children.'], 400);
        }
        $menu->delete();
        return response()->json(['success' => true]);
    }
    
}
