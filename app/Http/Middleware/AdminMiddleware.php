<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('show.login');
        }

        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
