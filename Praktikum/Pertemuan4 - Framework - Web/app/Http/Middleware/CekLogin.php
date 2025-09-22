<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Response;

class CekLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            Auth::logout();
            return redirect()->route('login')->with('status', 'Halaman ini dibatasi, silakan login terlebih dahulu.');
        }

        if (!empty($roles) && !in_array(Auth::user()->role, $roles)) {
            return response('Akses ditolak. Role tidak sesuai.', 403);
        }

        return $next($request);
    }
}
