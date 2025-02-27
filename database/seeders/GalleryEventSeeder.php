<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryEvent;

class GalleryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example seed data
        GalleryEvent::insert([
            [
                'title' => 'Spring Art Exhibition',
                'description' => 'A vibrant showcase of spring-inspired artworks featuring local and international artists.',
                'start_date' => '2024-03-20 10:00:00',
                'end_date' => '2024-03-30 18:00:00',
                'location' => 'Downtown Gallery',
                'image_url' => '/images/events/spring-exhibition.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Modern Sculpture Showcase',
                'description' => 'Explore the fascinating world of modern sculptures with interactive installations.',
                'start_date' => '2024-04-10 09:00:00',
                'end_date' => '2024-04-20 17:00:00',
                'location' => 'Art Plaza, New York',
                'image_url' => '/images/events/sculpture-showcase.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Photography Masters',
                'description' => 'A tribute to legendary photographers, showcasing iconic images from the last century.',
                'start_date' => '2024-05-01 11:00:00',
                'end_date' => '2024-05-15 19:00:00',
                'location' => 'City Art Museum',
                'image_url' => '/images/events/photography-masters.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Abstract Art Extravaganza',
                'description' => 'Immerse yourself in the colorful and thought-provoking world of abstract art.',
                'start_date' => '2024-06-05 12:00:00',
                'end_date' => '2024-06-15 20:00:00',
                'location' => 'Westside Art Studio',
                'image_url' => '/images/events/abstract-art.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Vintage Poster Exhibition',
                'description' => 'Step back in time with a collection of vintage posters from around the globe.',
                'start_date' => '2024-07-10 10:00:00',
                'end_date' => '2024-07-20 18:00:00',
                'location' => 'East End Gallery',
                'image_url' => '/images/events/vintage-poster.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
