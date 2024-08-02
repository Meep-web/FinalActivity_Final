<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
{
    if (!in_array($request->user()->role, $roles)) {
        return redirect('/'); // Redirect if the user does not have the required role
    }

    return $next($request);
}

// Register middleware in app/Http/Kernel.php
protected $routeMiddleware = [
    // other middleware
    'role' => \App\Http\Middleware\CheckRole::class,
];
}
