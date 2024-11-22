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
        return view('admin.Menue.menu', compact('menus', 'parents', 'pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'parent_id' => 'nullable|integer|exists:menus,id', 
            'page_id' => 'nullable|integer|exists:pages,id', 
            'is_active' => 'nullable|boolean', 
        ]);
    
        $slug = $this->generateUniqueSlug($request->title);
        $fullUrl = $slug; 
        $pageSlug = '';
    
        if (!empty($request->parent_id)) {
            $parent = Menu::find($request->parent_id);
            if ($parent) {
                $fullUrl = rtrim($parent->url, '/') . $slug; 
            }
        }
    
        // Create the menu item
        $menu = Menu::create([
            'title' => $request->title,
            'url' => $fullUrl,
            'order' => $request->order,
            'page_id' => $request->page_id,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active,
        ]);
    
        if (!empty($request->page_id)) {
            $page = Page::find($request->page_id);
            if ($page) {
                $page->update(['menu_slug' => $fullUrl]);
            }
        }
        return response()->json($menu, 201);
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
        $request->validate([
            'id' => 'required|integer|exists:menus,id',
            'title' => 'required|string|max:255',
            'page_id' => 'nullable|integer|exists:pages,id',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);
        $updatedUrl ='';
        $menu = Menu::findOrFail($request->id);
        $page = new Page();
    
        $titleUrl = $this->generateUniqueSlug($request->title);
        $page_url = null;

        if ($request->parent_id) {
            $parent = Menu::find($request->parent_id);
            $parentUrl = $parent ? $parent->url : null;
            $updatedUrl = $parentUrl . $titleUrl;
        }else{
            $updatedUrl = $request->slug;
        } 
    
    
        $page_url = null;
        if ($request->page_id) {
            $page = Page::find($request->page_id);
            $page_url = $page ? $page->slug : null;
            if ($page) {
                $page->update(['menu_slug' => $updatedUrl]);
            }
        }
        $updateData = [
            'title' => $request->title,
            'url' => $updatedUrl,
            'page_id' => $request->page_id,
            'parent_id' => $request->parent_id,
            'page_url' => $page_url,
            'order' => $request->order ?? $menu->order, 
            'is_active' => $request->is_active ?? $menu->is_active,
        ];
        
        $menu->update($updateData);
        return response()->json(['message' => 'Menu updated successfully.', 'menu' => $menu], 200);
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

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = Menu::where('url', 'like', "%/$slug%")->count();
        return $count ? "/{$slug}-{$count}" : "/{$slug}";
    }

}
