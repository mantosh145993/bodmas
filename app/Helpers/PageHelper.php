<?php

namespace App\Helpers;

use App\Models\Page;
use App\Models\Banner;

class PageHelper
{
    public function getPage()
    {
        $menus = Page::where('is_active', 1)
            ->orderBy('order')
            ->get();
        return $menus;
    }

    public function getBanner($id){
        $banners = Banner::where('is_active', 1)->where('page_id', $id)->first();
        return $banners;
    }

}
