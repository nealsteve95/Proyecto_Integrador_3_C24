<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();

        return response()->json($reservas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $validator=Validator::make($request->all(),[
            "nombre_huesped"=>"required|string|max:255",
            "apellido_huesped"=>"required|string|max:255",
            "tipo_identificacion_huesped"=>"required|string|in:dni,carnet extranjeria",
            "identificacion_huesped"=>"required|integer",
            "sexo_huesped"=>"required|string|in:hombre,mujer",
            "fecha_nacimiento_huesped"=>"required|date_format:d-m-Y",
            "nacionalidad_huesped"=>"required|string",
            "region_huesped"=>"required|string",
            "direccion_huesped"=>"required|string",
            "telefono_huesped"=>"required|integer",
            "correo_huesped"=>"required|string|email|max:255|unique:users",
            "ruc_empresa"=>"integer",
            "razon_social_empresa"=>"string",
            "direccion_empresa"=>"string",
            "fecha_reserva"=>"required|required|date_format:d-m-Y H:i",
            "cantidad_dias_reserva"=>"required|integer",
            "pax_reserva"=>"required|integer",
            "nro_habitacion_reserva"=>"required|integer",
            "tipo_habitacion_reserva"=>"required|string",
        ]);
        if($validator->fails()){
            return response()->json(["message" => "error en la reserva
            DESDE LA CUEVA", "ERROR"=> $validator->errors(), "status" => 200]);
        }
        $dataIdentificacion=[
            "tipo_identificacion"=>$request->tipo_identificacion_huesped,
            "identificacion_huesped"=>$request->identificacion_huesped
        ];
        $dataEmpresa=[
            "ruc_empresa"=>$request->ruc_empresa,
            "razon_social_empresa"=>$request->razon_social_empresa,
            "direccion_empresa"=>$request->direccion_empresa,
        ];
        $dataHuesped=[
            "nombre_huesped"=>$request->nombre_huesped,
            "apellido_huesped"=>$request->apellido_huesped,
            "identificacion"=>$dataIdentificacion,
            "sexo"=>$request->sexo_huesped,
            "fecha_nacimiento"=>$request->fecha_nacimiento_huesped,
            "nacionalidad_huesped"=>$request->nacionalidad_huesped,
            "region_huesped"=>$request->region_huesped,
            "direccion_huesped"=>$request->direccion_huesped,
            "telefono_huesped"=>$request->telefono_huesped,
            "correo_huesped"=>$request->correo_huesped,
            "empresa"=>$dataEmpresa
        ];
        $dataHabitacion=[
            "nro_habitacion_reserva"=>$request->nro_habitacion_reserva,
            "tipo_habitacion_reserva"=>$request->tipo_habitacion_reserva,
        ];

        $dataReserva=[
            "fecha_reserva"=>$request->fecha_reserva,
            "cantidad_dias_reserva"=>$request->cantidad_dias_reserva,
            "pax_reserva"=>$request->pax_reserva,
            "habitacion"=>$dataHabitacion
        ];
        $data=[
            "datosHuesped"=>$dataHuesped,
            "datosReserva"=>$dataReserva
        ];
        $reserva=new Reserva;
        $reserva->datosHuesped=$data["datosHuesped"];
        $reserva->datosReserva=$data["datosReserva"];
        $reserva->save();
        return response()->json([
            "message"=>"RESERVA CORRECTA DESDE LA CUEVA",
            "status"=>200,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
