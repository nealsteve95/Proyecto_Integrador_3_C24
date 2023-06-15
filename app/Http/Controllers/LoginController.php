<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    //
    public function logout(Request $req){
        $client = new Client();
        $token = $req->session()->get('token');
        $response=Http::withHeaders([
            'Authorization'=>'Bearer '.$token,
            'Accept' => 'application/json',
        ])->get('http://127.0.0.1:8000/api/logout');

        if($response->successful()){
            return redirect()->route("login");
        }
    }
    public function mostrarLogin(){
        return view("login");
    }
    public function checkLogin(Request $req){
        //Credenciales enviadas del formulario
        $credenciales=[
            "email"=>$req->input("email"),
            "password"=>$req->input("password")
        ];

        try{
            $client = new Client();
            $response = $client->post('http://127.0.0.1:8000/api/login', ['json' => $credenciales]);
            $status = $response->getStatusCode();
            if ($status == 200) {
                $data = json_decode($response->getBody(), true);
                $req->session()->put('token',$data["token"]);
                if ($data["rol"] == "gerente") {
                    return redirect()->route("gerente/home")->withCookie("token", $data["token"]);
                } else {
                    return redirect()->route("administrador/home")->withCookie("token", $data["token"]);
                }
            }
        }catch(ClientException $e){
            if ($e->getResponse()->getStatusCode() == 400) {

                $errorResponse = json_decode($e->getResponse()->getBody(), true);
                $errorMessage = $errorResponse["message"];
                return redirect()->route('login')->with('error', $errorMessage);
                dd($errorMessage);

            } else {
                return redirect()->route('login')->with('error', $e);
                throw $e;
            }
        }
        //dd($data);

        //http://127.0.0.1:8000/api/login
    }
}
