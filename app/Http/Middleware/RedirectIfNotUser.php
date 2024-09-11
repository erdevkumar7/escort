<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotUser
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login.form'); // Redirect to the login route if not authenticated
        }

        return $next($request);
    }
}
