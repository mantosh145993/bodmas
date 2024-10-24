<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if (Auth::check() && Auth::user()->is_admin) {
            // echo "Hello I am eligible to access this page.";die;
            return $next($request);
        }

        // If not an admin, redirect to a forbidden page or login
        return redirect('/admin')->withErrors(['errors' => 'You do not have admin access.']);
    }
}
