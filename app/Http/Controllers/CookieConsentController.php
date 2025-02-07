<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CookieConsent;
class CookieConsentController extends Controller
{
    public function store(Request $request)
    {
        $consent = CookieConsent::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);
        return response()->json(['status' => 'Consent recorded', 'data' => $consent]);
    }
}
