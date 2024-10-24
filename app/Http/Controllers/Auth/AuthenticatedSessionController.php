<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function login(): View
    {
        return view('admin.login');
    }

    // public function home(): View
    // {
    //     return view('admin.login');
    // }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $user = Auth::user();
        $request->session()->regenerate();
        if ($user->is_admin) { // This checks for truthiness
            return redirect()->intended('admin/dashboard'); // Redirect to the dashboard
        } else {
            $request->session()->invalidate();
            return redirect()->intended('admin')->withErrors(['errors' => 'You do not have admin access.']); // Redirect to a different page
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
}
