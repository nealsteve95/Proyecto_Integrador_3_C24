<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CustomAuthMiddleware
{

    public function handle($request, Closure $next)
    {
        if ($request->hasCookie('token')) {
            
            $token = $request->cookie('token');
            //$request->headers->set('Authorization', 'Bearer ' . $token);
        }
        //--------------PARA MOSTRARLE A NEALS--------------

        /* if (Auth::guard('sanctum')->check()) {
            return $next($request);
        } */

        $response=Http::withHeaders([
            'Authorization'=>'Bearer '.$token,
            'Accept' => 'application/json',
        ])->post('http://127.0.0.1:8000/api/auth');

        if($response->successful()){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error', "No se pudo autenticar");
        }

/*         return redirect()
        ->route('login')->with('error','No se pudo autenticar'); */
    }
}

