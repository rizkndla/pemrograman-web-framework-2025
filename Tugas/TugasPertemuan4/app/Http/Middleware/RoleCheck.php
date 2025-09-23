<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next, ...$roles): Response
{
    // cek apakah role user yang login ada di daftar role yang diizinkan
    if (! in_array($request->user()->role, $roles)) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
    }
}
