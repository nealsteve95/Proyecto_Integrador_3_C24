<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminReservaController extends Controller
{
    //
    public function realizarReserva(Request $req)
    {
        //dd($req);
        $huesped = json_decode($req->input("huesped"));
        $dataReserva = [
            /* "nombre_huesped" => $huesped->nombres,
            "apellido_huesped" => $huesped->apellidos,
            "tipo_identificacion_huesped" => $huesped->identificacion->tipo_identificacion,
            "identificacion_huesped" => $huesped->identificacion->identificacion_huesped,
            "sexo_huesped" => $huesped->sexo,
            "fecha_nacimiento_huesped" => $huesped->fecha_nacimiento,
            "nacionalidad_huesped" => $huesped->nacionalidad,
            "region_huesped" => $huesped->region,
            "direccion_huesped" => $huesped->direccion,
            "telefono_huesped" => $huesped->telefono,
            "correo_huesped" => $huesped->correo, 
            "ruc_empresa" => $huesped->empresa->ruc_empresa,
            "razon_social_empresa" => $huesped->empresa->razon_social,
            "direccion_empresa" => $huesped->empresa->direccion_empresa,*/
            "id_huesped"=>$req->input("id_huesped"),
            "fecha_reserva" => $req->input("fecha_reserva"),
            "cantidad_dias_reserva" => $req->input("cantidad_dias"),
            "pax_reserva" => $req->input("pax_reserva"),
            "nro_habitacion_reserva" => $req->input("nro_habitacion_reserva"),
            "tipo_habitacion_reserva" => $req->input("tipo_habitacion_reserva"),
        ];
        $response=Http::post("http://127.0.0.1:8000/api/reserva",$dataReserva);
        if($response->successful()){

            $responseBody=json_decode($response->body(),false);
            //dd($responseBody);
            return redirect()->route("administrador/reservas")->with("status",$responseBody->message);

        }else{

            return redirect()->back()->with("error",$responseBody->message);

        }
    }
    public function verificarIdentidad(Request $req)
    {
        $tipo_id=$req->input("tipo_identificacion");
        $dni=$req->input("id");
        if($tipo_id=="DNI"){

            $response = Http::get('http://127.0.0.1:8000/api/huesped?tipo=dni&id='.$dni);
            $responseData = json_decode($response->body(), false);
            if ($response->successful()) {
                //Mandarlo a vista donde solo complete datos de reserva
    
                return view("view_recepcionista.reservas.formReserva",["id_huesped"=>$responseData->data->_id]);
            } else {
                //Mandarlo a que se registre como huesped
                $data=[
                    "dni"=>$dni,
                    "tipo"=>"dni"
                ];
                return redirect()->route("administrador/createHuesped",["data"=>$data]);
            }
            
        }else{
            //dd($tipo_id,$dni);
            $response = Http::get('http://127.0.0.1:8000/api/huesped?tipo=extranjero&id='.$dni);
            $responseData = json_decode($response->body(), false);
            if($response->successful()){
                return view("view_recepcionista.reservas.formReserva",["id_huesped"=>$responseData->data->_id]);
            }else{
                $data=[
                    "dni"=>$dni,
                    "tipo"=>"extranjero"
                ];
                return redirect()->route("administrador/createHuesped",["data"=>$data]);
            }
        }
    }
    public function mostrarReservas()
    {
        $response = Http::get('http://127.0.0.1:8000/api/reserva');
        $responseData = json_decode($response->body(), true);

        //dd($responseData["data"]);
        if ($response->successful()) {
            return view('view_recepcionista.reservas.index', ['reservas' => $responseData["data"]]);
        } else {
            return view('view_recepcionista.reservas.index', ['reservas' => $responseData["data"]]);
        }
    }

    public function createReserva()
    {
        return view("view_recepcionista.reservas.showCreate");
    }
}
