<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(Auth::check() && Auth::user()->role == $role ){
            return $next($request);
        }
        if(Auth::check() && Auth::user()->role == 'admin'){
            return redirect()->route("admin.dashboard");
        } else if(Auth::check() && Auth::user()->role == 'petugas'){
            return redirect()->route("petugas.dashboard");
        } else if(Auth::check() && Auth::user()->role == 'user'){
            return redirect()->route("user.dashboard");
        }

        if(!Auth::check()){
            return redirect()->route('login.page');
        }
        // abort(403);
    }
}
