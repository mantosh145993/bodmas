<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('childrenForAdmin')->whereNull('parent_id')->orderBy('order')->get();
        $parents = Menu::all();
        $pages = Page::all();
        return view('admin.menue.menu', compact('menus', 'parents', 'pages'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'integer',
            'parent_id' => 'nullable|integer|exists:menus,id',
        ]);
        $slug = $this->generateUniqueSlug($request->title);
        $fullUrl = $slug;
        $pageSlug = '';
        if ($request->parent_id) {
            $parent = Menu::find($request->parent_id);
            if ($parent) {
                $fullUrl = rtrim($parent->url, '/') . $slug;
            }
        }
        if ($request->page_id) {
            $page_url = Page::find($request->page_id);
            if ($page_url) {
                $pageSlug = '/' . $page_url->slug;
            }
            // dd($pageSlug);
        }
        $menu = Menu::create([
            'title' => $request->title,
            'url' => $fullUrl,
            'page_url' => $pageSlug,
            'order' => $request->order,
            'page_id' => $request->page_id,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active,
        ]);
        return response()->json($menu, 201);
    }

    private function generateUniqueSlug($title)
    {
        // Generate the initial slug
        $slug = Str::slug($title);
        $count = Menu::where('url', 'like', "%/$slug%")->count();
        return $count ? "/{$slug}-{$count}" : "/{$slug}";
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $parents = Menu::all();
        $pages = Page::all();
        return view('admin.menue.edit', compact('menu', 'parents', 'pages'));
    }

    public function update(Request $request)
    {
        // Validate required fields
        $request->validate([
            'id' => 'required|integer|exists:menus,id',
            'title' => 'required|string|max:255',
        ]);
        $slug = $this->generateUniqueSlug($request->title);
        $menu = Menu::findOrFail($request->id);
        $pageSlug = $menu->url;
        $pageUrl = $menu->page_url;
        if (empty($request->parent_id) || $menu->parent_id != $request->parent_id) {
            $parent = Menu::find($request->parent_id);
            if ($parent) {
                $pageSlug = rtrim($parent->url, '/') . $slug;
            }
        } else {
            $pageSlug = $slug;
        }
        if (empty($request->page_id) || $menu->page_id != $request->page_id) {
            $page = Page::find($request->page_id);
            if ($page) {
                $pageUrl = '/' . $page->slug  . $request->page_url;
            }
        } else {
            $pageUrl = $request->page_url;
        }

        $updateData = [
            'title' => $request->title,
            'url' => $pageSlug,
            'page_url' => $pageUrl,
            'order' => $request->order,
            'is_active' => $request->is_active
        ];

        if ($menu->parent_id != $request->parent_id  && $request->has('parent_id')) {
            $updateData['parent_id'] = $request->parent_id;
        }
        if ($menu->page_id != $request->page_id && $request->has('page_id')) {
            $updateData['page_id'] = $request->page_id;
        }
        $menu->update($updateData);
        return response()->json($menu, 200);
    }

    public function updateOrder(Request $request)
    {
        $menuData = $request->input('menu');
        if (!is_array($menuData) || empty($menuData)) {
            return response()->json(['success' => false, 'message' => 'No menu data provided.'], 400);
        }
        foreach ($menuData as $menuItem) {
            if (isset($menuItem['id'])) {
                Menu::where('id', $menuItem['id'])->update([
                    'order' => isset($menuItem['order']) ? $menuItem['order'] : null,
                    'parent_id' => isset($menuItem['parent_id']) ? $menuItem['parent_id'] : null,
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'Menu item ID is missing.'], 400);
            }
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
