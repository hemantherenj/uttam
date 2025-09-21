<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {

            // 👇 Admin panel ke liye
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login'); // admin login route
            }

            // 👇 Default User ke liye
            return route('home'); // user login route
        }

        return null;
    }
}
