<?php

namespace App\Http\Controllers;

use App\Models\Habitacione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    
    public function __construct()
    {
            $this->middleware('admin');
    }
    //
    public function habitaciones(Request $req){
        $query = Habitacione::query();

        if ($req->has("tipo")) {
            $query->where("tipo_habitacion", $req->input("tipo"));
        }
        
        if ($req->has("precio")) {
            $precio = $req->input("precio");
            if ($precio == "barato") {
                $query->whereBetween("precio", [0, 100]);
            } elseif ($precio == "medio") {
                $query->whereBetween("precio", [101, 150]);
            } elseif ($precio == "caro") {
                $query->whereBetween("precio", [151, 250]);
            }
        }
        
        if ($req->has("features")) {
            $features = $req->input("features");
            if ($features == "tele") {
                $query->whereIn("caracteristicas", ["Tele"]);
            } elseif ($features == "baño") {
                $query->whereIn("caracteristicas", ["baño"]);
            } 
        }
        

        $habitaciones = $query->get();


        return response()->json($habitaciones);

    }
    /* public function login(Request $req){
        $response=["status"=>0,"msg"=>""];

        //Faltaria verificar integridad de datos 
        $data=json_decode($req->getContent());
        $user=User::where("email",$data->email)->first();
        if($user){
            if(Hash::check($data->password,$user->password)){
                $token=$user->createToken($user->name);
                $response["status"]=1;
                $response["msg"]=$token->plainTextToken;
                if($user->tipoUsuario=="admin"){
                    $response["msg"]=$token->plainTextToken;
                }else{
                    $response["msg"]=$token->plainTextToken;
                }
            }else{
                $response["msg"]="Crendenciales Incorrectas";
            }
        }else{
            $response["msg"]="Usuario no encontrado";
        }

        return $response;
    } */
}
