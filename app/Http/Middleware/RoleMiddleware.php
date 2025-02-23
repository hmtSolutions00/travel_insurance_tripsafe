<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        //Jika belum login, redirect ke halaman utama dengan pesan error
        if (!Auth::check()) {
            return Redirect::to('/')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        // Jika sudah login tapi tidak memiliki role yang sesuai
        if (Auth::user()->role !== $role) {
            return Redirect::to('/')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }

        return $next($request);
    }
    }

