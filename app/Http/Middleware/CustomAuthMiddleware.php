<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuthMiddleware
{

    public function handle($request, Closure $next)
    {
        if ($request->hasCookie('token')) {
            
            $token = $request->cookie('token');
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }


        if (Auth::guard('sanctum')->check()) {
            return $next($request);
        }

        return redirect()
        ->route('login')->with('error','No se pudo autenticar');
    }
}

