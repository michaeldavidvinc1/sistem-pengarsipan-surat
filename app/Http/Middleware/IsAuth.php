<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role == 'admin'){
            return redirect()->route("admin.dashboard");
        } else if(Auth::check() && Auth::user()->role == 'petugas'){
            return redirect()->route("petugas.dashboard");
        } else if(Auth::check() && Auth::user()->role == 'user'){
            return redirect()->route("user.dashboard");
        }
        return $next($request);
    }
}
