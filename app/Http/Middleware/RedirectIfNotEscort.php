<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotEscort
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('escort')->check()) {
            return redirect('/login'); // Redirect to login or another appropriate route
        }

        return $next($request);
    }
}
