<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        // return $request->expectsJson()
        //  ? null : route('login');

        if (!$request->expectsJson()) {
            if ($request->is('dashboard/*'))
                return route('dashboard');
        } else
            return route('login');
    }
}
