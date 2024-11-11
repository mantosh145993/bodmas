<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title', 'url', 'page_url', 'page_id', 'parent_id', 'order', 'is_active'];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->with('children');
    }
    public function childrenForAdmin()
    {
        return $this->hasMany(Menu::class, 'parent_id')->with('childrenForAdmin');
    }


    public function childrenForPublic()
    {
        return $this->hasMany(Menu::class, 'parent_id')->with('childrenForPublic')->where('is_active', 1);
    }

    public function grandChildForPublic()
    {
        return $this->hasMany(Menu::class, 'parent_id')
                    ->whereNotNull('parent_id') // Optional: add conditions as needed
                    ->orderBy('order');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function showHeader()
    {
        $menus = Menu::whereNull('parent_id')->with('children')->orderBy('order')->get();
        return view('header', compact('menus'));
    }
}
