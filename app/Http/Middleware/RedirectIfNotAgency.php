<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAgency
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('agency')->check()) {
            return redirect()->route('agency.login'); // Redirect to agency login page
        }

        return $next($request);
    }
}

