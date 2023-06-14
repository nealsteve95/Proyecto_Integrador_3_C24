<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $token = $request->session()->get('token');
        
        if($request->is('gerente/*')){
            $role="gerente";
        }else if($request->is('administrador/*')){
            $role="admin";
        }
        $response=Http::withHeaders([
            'Authorization'=>'Bearer '.$token,
            'Accept' => 'application/json',
        ])->post('http://127.0.0.1:8000/api/auth/role',["role"=>$role]);

        if($response->successful()){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error', "No se pudo autenticar");
        }

        
    }
}
