<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use \stdClass;
use Illuminate\Support\Facades\Hash;

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

        $user=User::create(
            [
                "name"=>$req->name,
                "email"=>$req->email,
                "password"=>Hash::make($req->password),
                "role"=>$req->role,
            ]
        );
         $token=$user->createToken("token")->plainTextToken;

         return response()->json(["data"=>$user,"token"=>$token]);
    }

    public function login(Request $req){
        if(!Auth::attempt($req->only("email","password"))){
            return response()->json(["message"=>"No estas autorizado"],401);
        }
        $user=User::where("email",$req["email"])->firstOrFail();

        $token=$user->createToken("token")->plainTextToken;

        return response()->json([
            "message"=>"Bienvenido ". $user->name,
            "token"=>$token,
            "user"=>$user
        ]);
    }

    public function logout(Request $request){
        //borrar todos los token
        $request->user()->currentAccessToken()->delete();

        return [
            "message"=>"Haz cerrado sesión correctamente y se borro tu token"
        ];
    }
}