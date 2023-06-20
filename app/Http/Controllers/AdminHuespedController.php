<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminHuespedController extends Controller
{
    public function index()
    {
        $response = Http::get("http://127.0.0.1:8000/api/huespedes");
        $responseBody = json_decode($response->body(), false);
        // dd($responseBody);
        return view('view_recepcionista/huespedes/index', ["huespedes" => $responseBody->data]);
    }

    public function show(Request $req)
    {
        $response = Http::get("http://127.0.0.1:8000/api/huesped?tipo=id&id=" . $req->id);
        $responseBody = json_decode($response->body(), false);
        // dd($responseBody);
        return view('view_recepcionista.huespedes.show', ['huesped' => $responseBody->data]);
    }

    public function update(Request $req, $id)
    {
        $huesped = [
            "tipo_identificacion_huesped" => $req->input("tipo_identificacion"),
            "identificacion_huesped" => $req->input("identificacion"),
            "nombre_huesped" => $req->input("nombres"),
            "apellido_huesped" => $req->input("apellidos"),
            "sexo_huesped" => $req->input("sexo"),
            "fecha_nacimiento_huesped" => $req->input("fecha_nacimiento"),
            "nacionalidad_huesped" => $req->input("nacionalidad"),
            "region_huesped" => $req->input("region"),
            "direccion_huesped" => $req->input("direccion"),
            "telefono_huesped" => $req->input("telefono"),
            "correo_huesped" => $req->input("correo"),
            "nombre_empresa" => $req->input("nombre_empresa"),
            "ruc_empresa" => $req->input("ruc_empresa"),
            "razon_social" => $req->input("razon_social_empresa"),
            "direccion_empresa" => $req->input("direccion_empresa")
        ];

        $response = Http::put("http://127.0.0.1:8000/api/huespedes/{$id}", $huesped);
        $responseBody = json_decode($response->getBody(), false);
        if ($response->successful()) {
            return view("view_recepcionista.huespedes.show", ["huesped" => $responseBody->data]);
        } else {
            return redirect()->back()->with('error', $responseBody->message);
        }
    }
    public function updateEmpresa(Request $req, $id)
    {
        $empresa = [
            "ruc_empresa_empresa" => $req->input("ruc_empresa"),
            "razon_social_empresa" => $req->input("razon_social"),
            "direccion_empresa_empresa" => $req->input("direccion_empresa"),
        ];

        $response = Http::put("http://127.0.0.1:8000/api/huespedesEmpresa/{$id}", $empresa);
        $responseBody = json_decode($response->getBody(), false);
        dd($responseBody);

        if ($response->successful()) {
            return view("view_recepcionista.huespedes.show", ["huesped" => $responseBody->data]);
        } else {
            return redirect()->back()->with('error', $responseBody->message);
        }
    }


    public function storeHuesped(Request $req)
    {
        $huesped = [
            "tipo_identificacion_huesped" => $req->input("tipo_identificacion"),
            "identificacion_huesped" => $req->input("identificacion"),
            "nombre_huesped" => $req->input("nombres"),
            "apellido_huesped" => $req->input("apellidos"),
            "sexo_huesped" => $req->input("sexo"),
            "fecha_nacimiento_huesped" => $req->input("fecha_nacimiento"),
            "nacionalidad_huesped" => $req->input("nacionalidad"),
            "region_huesped" => $req->input("region"),
            "direccion_huesped" => $req->input("direccion"),
            "telefono_huesped" => $req->input("telefono"),
            "correo_huesped" => $req->input("correo"),
            "nombre_empresa" => $req->input("nombre_empresa"),
            "ruc_empresa" => $req->input("ruc_empresa"),
            "razon_social" => $req->input("razon_social_empresa"),
            "direccion_empresa" => $req->input("direccion_empresa")
        ];
        //$huespedJson=json_encode($huesped,JSON_PRETTY_PRINT);
        //dd($huespedJson);

        $response = Http::post("http://127.0.0.1:8000/api/huesped", $huesped);
        $responseBody = json_decode($response->getBody(), false);
        //dd($responseBody);
        if ($response->successful()) {

            return view("view_recepcionista.reservas.formReserva", ["id_huesped" => $responseBody->data->_id]);
        } else {

            return redirect()->back()->with('error', $responseBody->message);
        }
    }
    public function createHuesped(Request $req)
    {
        $data = $req->input("data");
        $dni = $data["dni"];
        $tipo = $data["tipo"];
        if ($tipo == "dni") {

            $tokenApi = "5c12ab652110356eab9a7822406b989758aef9b93e15d121559b3a7ea5237962";
            $response = Http::get("https://apiperu.dev/api/dni/$dni?api_token=$tokenApi");
            $responseBody = json_decode($response->body(), false);
            if ($response->successful()) {
                if ($responseBody->success == false) {
                    //dd($responseBody);
                    return redirect()->back()->with("error", $responseBody->message);
                } else {

                    return view("view_recepcionista.huespedes.showCreate", ["data" => $responseBody->data]);
                }
            } else {
                $data = json_decode(json_encode([
                    "numero" => $dni,
                    "nombres" => "",
                    "apellido_paterno" => ""
                ]));
                return view("view_recepcionista.huespedes.showCreate", ["data" => $data])->with("error", "Servicio de RENIEC no disponible");
            }
        } else {
            $data = json_decode(json_encode([
                "numero" => $dni,
                "nombres" => "",
                "apellido_paterno" => ""
            ]));
            return view("view_recepcionista.huespedes.showCreate", ["data" => $data]);
        }
    }

    public function delete($id)
    {
        $response = Http::delete("http://127.0.0.1:8000/api/huespedes/{$id}");
        $responseBody = json_decode($response->body(), false);
        dd($responseBody);
        return view('view_recepcionista/huespedes/index', ["huespedes" => $responseBody->data]);
    }
}
