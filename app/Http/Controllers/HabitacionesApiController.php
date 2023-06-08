<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

class HabitacionesApiController extends Controller
{
    //
    public function index(Request $req){
        $query = Habitacion::query();

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
                $query->where("caracteristicas", "Tele");
            } elseif ($features == "baño") {
                $query->where("caracteristicas", "baño");
            } 
        }

        $habitaciones = $query->get();

        return response()->json($habitaciones);
    }
}