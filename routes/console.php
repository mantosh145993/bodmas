<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Register your custom sitemap command
app()->singleton(Schedule::class, function ($app) {
    return tap(new Schedule, function ($schedule) {
        // Schedule sitemap:generate command to run daily
        $schedule->command('sitemap:generate')->daily(); 
    });
});