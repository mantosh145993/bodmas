<?php // Code within app/Helpers/Helper.php

namespace App\Helpers;

use Illuminate\Support\Facades\View;

class ViewHelper
{
    public static function header_content($title = 'Default Title') {
        return View::make('admin.layouts.head', compact('title'))->render();
    }
    
    public static function footer_content() {
        return View::make('admin.layouts.footer')->render();
    }
}
