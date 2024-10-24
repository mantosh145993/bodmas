<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Dummy menu items
        $menus = [
            ['title' => 'Home', 'url' => '/', 'parent_id' => null, 'order' => 1],
            ['title' => 'About', 'url' => '/about', 'parent_id' => null, 'order' => 2],
            ['title' => 'Services', 'url' => '/services', 'parent_id' => null, 'order' => 3],
            ['title' => 'Blog', 'url' => '/blog', 'parent_id' => null, 'order' => 4],
            ['title' => 'Contact', 'url' => '/contact', 'parent_id' => null, 'order' => 5],
            // Nested menu items
            ['title' => 'Web Development', 'url' => '/services/web-development', 'parent_id' => 3, 'order' => 1],
            ['title' => 'SEO', 'url' => '/services/seo', 'parent_id' => 3, 'order' => 2],
            ['title' => 'Graphic Design', 'url' => '/services/graphic-design', 'parent_id' => 3, 'order' => 3],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
