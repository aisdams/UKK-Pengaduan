<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthLoginMiddleware
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
        if (auth()->check()) {
            return redirect()->route('masyarakat.index');
        }

        return redirect()->route('loginmasyarakat')->with('error', 'Anda harus login terlebih dahulu.');
    }
}
