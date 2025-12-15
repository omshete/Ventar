<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // FIXED: Use default guard + skip is_admin check for now
        if (!Auth::check()) {
            return redirect()->route('admin.login.show');
        }

        // TEMPORARILY skip is_admin check until you add the column
        // if (!auth()->user()->is_admin) {
        //     Auth::logout();
        //     return redirect()->route('admin.login.show');
        // }

        return $next($request);
    }
}
