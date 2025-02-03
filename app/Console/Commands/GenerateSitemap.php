<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Page;
use App\Models\Menu;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate a sitemap.xml file dynamically for all routes';

    public function handle()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Get all web routes dynamically
        // $routes = collect(Route::getRoutes())->map(function ($route) {
        //     return $route->uri();
        // })->filter(function ($uri) {
        //     return !Str::startsWith($uri, ['admin', '_ignition', 'sanctum', 'api']);
        // });
        // Add each route to the sitemap
        // foreach ($routes as $route) {
        //     $xml .= '<url>';
        //     $xml .= '<loc>' . url($route) . '</loc>';
        //     $xml .= '<changefreq>monthly</changefreq>';
        //     $xml .= '<priority>0.7</priority>';
        //     $xml .= '</url>';
        // }

        $posts = Post::latest()->get();
        foreach ($posts as $post) {
            $url = url('/blog_details/' . $post->slug);
            if (Str::startsWith($url, url('admin'))) {
                continue;  // Skip admin posts
            }
            $xml .= '<url>';
            $xml .= '<loc>' . $url . '</loc>';
            $xml .= '<lastmod>' . $post->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

        $menuItems = Menu::all();
        foreach ($menuItems as $menuItem) {
            $page = Page::where('menu_slug', $menuItem->url)->first();
            if ($page) {
                $menuSlug = $menuItem->url ?? 'default-menu';
                $url = url( $menuSlug );
                if (Str::startsWith($url, url('admin'))) {
                    continue; 
                }
                $xml .= '<url>';
                $xml .= '<loc>' . $url . '</loc>';
                $xml .= '<lastmod>' . $page->updated_at->toAtomString() . '</lastmod>';
                $xml .= '<changefreq>weekly</changefreq>';
                $xml .= '<priority>0.8</priority>';
                $xml .= '</url>';
            }
        }
        $xml .= '</urlset>';
        Storage::disk('public')->put('sitemap.xml', $xml);
        $this->info('✅ Sitemap generated successfully with all dynamic routes!');
    }
}
