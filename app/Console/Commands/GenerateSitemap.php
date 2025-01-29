<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Page;
use App\Models\Category;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate a sitemap.xml file dynamically for all routes';

    public function handle()
    {
        // Start XML Sitemap
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Get all web routes dynamically
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return $route->uri();
        })->filter(function ($uri) {
            // Filter out unwanted routes like admin routes
            return !Str::startsWith($uri, ['admin', '_ignition', 'sanctum', 'api']); 
        });

        // Add each route to the sitemap
        foreach ($routes as $route) {
            $xml .= '<url>';
            $xml .= '<loc>' . url($route) . '</loc>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.7</priority>';
            $xml .= '</url>';
        }

        // Fetch dynamic content (Blog Posts)
        $posts = Post::latest()->get();
        foreach ($posts as $post) {
            $xml .= '<url>';
            $xml .= '<loc>' . url('/blog_details/' . $post->slug) . '</loc>';
            $xml .= '<lastmod>' . $post->updated_at->toAtomString() . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

         // Fetch dynamic content (Blog Posts)
         $posts = Page::latest()->get();
         foreach ($posts as $post) {
             $xml .= '<url>';
             $xml .= '<loc>' . url('/blog_details/' . $post->slug) . '</loc>';
             $xml .= '<lastmod>' . $post->updated_at->toAtomString() . '</lastmod>';
             $xml .= '<changefreq>weekly</changefreq>';
             $xml .= '<priority>0.8</priority>';
             $xml .= '</url>';
         }
 


        $xml .= '</urlset>';

        // Save sitemap.xml in storage
        Storage::disk('public')->put('sitemap.xml', $xml);

        $this->info('✅ Sitemap generated successfully with all dynamic routes!');
    }
}
