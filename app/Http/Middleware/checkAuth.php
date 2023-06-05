<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //$ruta=$request->path();
        if($request->is('gerente/*')){
            if(Auth::check() && Auth::user()->role=="gerente"){
                return $next($request);
            }else{
                return redirect()->back()->with("error","No es tu rol");
            }
        }else if($request->is('administrador/*')){
            if(Auth::check() && Auth::user()->role=="admin"){
                return $next($request);
            }else{
                return redirect()->back()->with("error","No es tu rol");
            }
        }

        
    }
}
