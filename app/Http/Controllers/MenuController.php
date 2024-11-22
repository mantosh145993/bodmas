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
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'parent_id' => 'nullable|integer|exists:menus,id', // Validate if parent_id exists in menus
            'page_id' => 'nullable|integer|exists:pages,id', // Validate if page_id exists in pages
            'is_active' => 'nullable|boolean', // Added to validate is_active
        ]);
    
        // Generate a unique slug for the menu title
        $slug = $this->generateUniqueSlug($request->title);
        $fullUrl = $slug; // Start with the slug for URL
        $pageSlug = '';
    
        // Check if parent_id is provided and find the parent menu
        if (!empty($request->parent_id)) {
            $parent = Menu::find($request->parent_id);
            if ($parent) {
                // Construct the full URL by appending the slug to the parent URL
                $fullUrl = rtrim($parent->url, '/') . $slug; // Ensure there's a slash between parent and slug
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
    
        // Check if page_id exists and update menu_slug in Page table
        if (!empty($request->page_id)) {
            $page = Page::find($request->page_id);
            if ($page) {
                // Update the menu_slug column with the full URL if the page exists
                $page->update(['menu_slug' => $fullUrl]);
            }
        }
    
        // Return a JSON response with the created menu item
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
        // Validate required fields
        $request->validate([
            'id' => 'required|integer|exists:menus,id',
            'title' => 'required|string|max:255',
            'page_id' => 'nullable|integer|exists:pages,id',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);
    
        // Find the menu item
        $menu = Menu::findOrFail($request->id);
        $page = new Page();
    
        // Initialize the URL and page URL
        $url = $menu->url;
        $page_url = null;

        if ($request->parent_id) {
            $parent = Menu::find($request->parent_id);
            $url = $parent ? $parent->url : null;
            $url = $url . $this->generateUniqueSlug($request->title);;
            // dd($url);
        } else {
            $url = $request->slug;
        }
    
    
        if ($request->page_id) {
            $page = Page::find($request->page_id);
            $page_url = $page ? $page->slug : null;
            if ($page) {
                $page->update(['menu_slug' => $url]); // Update menu_slug only if Page exists
            }
        } 

    
        // Prepare data for update
        $updateData = [
            'title' => $request->title,
            'url' => $url,
            'parent_id' => $request->parent_id,
            'page_url' => $page_url,
            'order' => $request->order ?? $menu->order, // Retain current order if not provided
            'is_active' => $request->is_active ?? $menu->is_active, // Retain current status if not provided
        ];
        
        // Update the menu item
        $menu->update($updateData);
       
    
        // Return a JSON response with the updated menu
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
        // Generate the initial slug
        $slug = Str::slug($title);
        $count = Menu::where('url', 'like', "%/$slug%")->count();
        return $count ? "/{$slug}-{$count}" : "/{$slug}";
    }

}
