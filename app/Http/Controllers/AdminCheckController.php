<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkin;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class AdminCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarCheck(Request $req)
    {
        //
        //dd($req);
        $responseChecksIn=Http::get("http://127.0.0.1:8000/api/checkin");
        $dataCheckIn = json_decode($responseChecksIn->getBody(), true);
        $responseChecksOut=Http::get("http://127.0.0.1:8000/api/checkout");
        $dataCheckOut = json_decode($responseChecksOut->getBody(), true);

/*         $client = new Client();
        $response = $client->get('https://127.0.0.1:8000/api/reserva');
        $data = json_decode($response->getBody(), true); */
        return view('view_recepcionista/checks/index',['checksin' => $dataCheckIn["data"],'checksout'=>$dataCheckOut["data"]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmarCheckIn(Request $req)
    {
        //
        $token = $req->session()->get('token');
        $id=$req->input("id");
        $responseReserva = Http::get("http://127.0.0.1:8000/api/reserva?id=$id");
        $responseUser = Http::withHeaders([
            'Authorization'=>'Bearer '.$token,
            'Accept' => 'application/json',
            ])->get("http://127.0.0.1:8000/api/auth/info");
        $dataReserva = json_decode($responseReserva->getBody(), true);
        $dataUser = json_decode($responseUser->getBody(), true);
        //dd($dataReserva["data"][0]);
        return view('view_recepcionista/checks/checkInForm',["data"=>$dataReserva["data"][0],"user"=>$dataUser]);
    }
    public function generarCheckIn(Request $req){
        //http://127.0.0.1:8000/api/checkin
        $checkIn=[
            "id_huesped"=>$req->input("id_huesped"),
            "nro_habitacion"=>$req->input("nro_habitacion"),
            "id_recepcionista"=>$req->input("id_recepcionista"),
            "tipo_reserva"=>$req->input("tipo_reserva"),
            "paxs"=>$req->input("paxs"),
            "cantidad_dias"=>$req->input("cantidad_dias"),
            "motivo_viaje"=>$req->input("motivo_viaje"),
            "fecha_ingreso"=>$req->input("fecha_ingreso"),
            "nota_adicionales"=>$req->input("nota_adicionales"),
        ];
        $response=Http::post("http://127.0.0.1:8000/api/checkin",$checkIn);
        //dd($response->body());
        if($response->successful()){
            return redirect()->route('administrador/check');
        }else{
            return redirect()->back();
        }
    }
    public function confirmarCheckOut(Request $req)
    {
        //
        $token = $req->session()->get('token');
        $id=$req->input("id");
        $responseUser = Http::withHeaders([
            'Authorization'=>'Bearer '.$token,
            'Accept' => 'application/json',
            ])->get("http://127.0.0.1:8000/api/auth/info");
        $dataUser = json_decode($responseUser->getBody(), true);
        $responseCheckIn = Http::get("http://127.0.0.1:8000/api/checkin?id=$id");
        $dataCheckIn = json_decode($responseCheckIn->getBody(), true);
        
        //dd($dataCheckIn["data"][0]);
        return view('view_recepcionista/checks/checkOutForm',["data"=>$dataCheckIn["data"][0],"user"=>$dataUser["data"]]);
    }
    public function generarCheckOut(Request $req){
        //http://127.0.0.1:8000/api/checkout

        $checkOut=[
            "id_checkin"=>$req->input("id_checkin"),
            "id_recepcionista"=>$req->input("id_recepcionista"),
            "forma_pago"=>$req->input("forma_pago"),
            "estado_pago"=>$req->input("estado_pago"),
            "descripcion_salida"=>$req->input("descripcion_salida"),
            "fecha_salida"=>$req->input("fecha_salida"),
        ];
        $response=Http::post("http://127.0.0.1:8000/api/checkout",$checkOut);
        //dd($response->body());
        if($response->successful()){
            return redirect()->route('administrador/check');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
