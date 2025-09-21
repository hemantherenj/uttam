<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class FrontAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('front')->check()) {
            return redirect()->route('login');
        }
        // if (! $request->front() || ! $request->front()->isAdmin()) {
        //     return redirect('home'); // Redirect if not admin
        // }
        return $next($request);
    }
}
