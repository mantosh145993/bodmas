<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function linkPage()
    {
        return view('admin.shortlink');
    }
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $code = Str::random(6);
        $shortLink = ShortLink::create([
            'url' => $request->url,
            'code' => $code
        ]);
        if (app()->environment('local')) {
            $baseURL = env('APP_URL');
        } else {
            $baseURL = env('PRODUCTION_URL');
        }
        return response()->json([
            'short_url' => $baseURL . '/' . $code
        ]);
    }

    public function redirect($code)
    {
        $shortLink = ShortLink::where('code', $code)->first();
        if ($shortLink) {
            return redirect($shortLink->url);
        }
        return abort(404, 'Shortened URL not found.');
    }
}
