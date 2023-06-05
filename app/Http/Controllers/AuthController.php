<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Administrador;
use \stdClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function register(Request $req){
        $validator=Validator::make($req->all(),[
            "name"=>"required|string|max:255",
            "email"=>"required|string|email|max:255|unique:users",
            "password"=>"required|string|min:8",
            "role"=>"required|string|min:4",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user=Administrador::create(
            [
                "name"=>$req->name,
                "email"=>$req->email,
                "password"=>Hash::make($req->password),
                "role"=>$req->role,
                "phone"=>$req->phone,
                "turno"=>$req->turno,
                "lastName"=>$req->lastName,
                "dni"=>$req->dni,

            ]
        );
         $token=$user->createToken("token")->plainTextToken;

         //return response()->json(["data"=>$user,"token"=>$token]);
         return redirect()->route("gerente/recepcionistas");
    }

    public function login(Request $req){
         if(!Auth::attempt($req->only("email","password"))){
            
            return redirect()->route('login')->with('error', 'Credenciales Incorrectas');;
        } 
        $user=Administrador::where("email",$req["email"])->firstOrFail();

        $token=$user->createToken("token")->plainTextToken;
        $cookie = cookie('token', $token, 60);
        $role=$user->role;
        if($role=="admin"){
            $url = route('administrador/home');
            return redirect($url)->withCookie(cookie('token', $cookie, $minutes = 60, $path = null, $domain = null, $secure = true, $httpOnly = true));
        }else{
            $url = route('gerente/home');
            return redirect($url)->withCookie(cookie('token', $cookie, $minutes = 60, $path = null, $domain = null, $secure = true, $httpOnly = true));
        }

    }

    public function logout(){
        //borrar todos los token
        /* $request->user()->currentAccessToken()->delete();
        
        return [
            "message"=>"Haz cerrado sesión correctamente y se borro tu token"
        ]; */
    
        // Borrar los datos de autenticación del guardia
        $guard = Auth::guard('sanctum');

        // Obtener el usuario autenticado
        $user = $guard->user();
    
        if ($user) {
            // Borrar todos los tokens de API del usuario
            $user->tokens()->delete();
        }
        Session::flush();
        return redirect()->route('login')->with("status","Sesion Cerrada");

    }
}