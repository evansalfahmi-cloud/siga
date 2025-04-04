<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TendikMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'tendik') {
            return $next($request);
        }
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses untuk tindakan ini.');
    }
}
