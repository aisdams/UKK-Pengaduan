<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Masy as Middleware;
use Illuminate\Http\Request;

class Masy extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not Masyd.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login-masyarakat');
    }
}
