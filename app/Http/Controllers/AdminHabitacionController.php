<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminHabitacionController extends Controller
{
    public function index()
    {

        $response = Http::get('http://127.0.0.1:8000/api/habitaciones');
        $responseData = json_decode($response->body(), false);
        // dd($responseData);


        return view('view_recepcionista/habitaciones/index', ["habitaciones" => $responseData->data]);
    }

    public function show(Request $req)
    {
        $response = Http::get("http://127.0.0.1:8000/api/habitacion?id=" . $req->id);
        $responseBody = json_decode($response->body(), false);
        // dd($responseBody);
        return view('view_recepcionista.habitaciones.show', ['habitacion' => $responseBody->data]);
    }
    public function update(Request $req, $id)
    {
        $habitacion = [
            "nro_habitacion_habitacion" => $req->input("nro_habitacion"),
            // "nro_piso_habitacion" => $req->input("nro_piso"),
            "tipo_habitacion_habitacion" => $req->input("tipo_habitacion"),
            "precio_habitacion" => $req->input("precio"),
            "estado_habitacion" => $req->input("estado"),
            "caracteristicas_habitacion" => $req->input("caracteristicas"),
            // "imagen_habitacion" => $req->input("imagen")
        ];

        $response = Http::put("http://127.0.0.1:8000/api/habitaciones/{$id}", $habitacion);
        $responseBody = json_decode($response->getBody(), false);
        dd($responseBody);
        if ($response->successful()) {
            return view("view_recepcionista.habitaciones.show", ["habitacion" => $responseBody->data]);
        } else {
            return redirect()->back()->with('error', $responseBody->message);
        }
    }
}
