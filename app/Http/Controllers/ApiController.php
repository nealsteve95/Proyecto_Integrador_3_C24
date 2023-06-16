<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Habitacion;
use App\Models\Reserva;

class ApiController extends Controller
{
    //
    public function obtenerTokenAcceso()
    {
        $user = Auth::user();

        if ($user) {
            $accessToken = $user->createToken('token')->plainTextToken;
            return response()->json([
                'status' => 200,
                'message' => 'Token de acceso obtenido correctamente',
                'token' => $accessToken,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'No se ha iniciado sesión',
            ]);
        }
    }
    public function checkAuthRole(Request $req)
    {
        if ($req->input("role") == "gerente") {
            if (Auth::guard('sanctum')->check() && Auth::guard('sanctum')->user()->role=="gerente") {
                return response()->json([
                    "status" => 200,
                    "message" => "pasa"
                ]);
            } else {
                return response()->json([
                    "status" => 400,
                    "message" => "no pasa"
                ]);
            }
        } else if ($req->input("role") == "admin") {
            if (Auth::guard('sanctum')->check() && Auth::guard('sanctum')->user()->role=="admin") {
                return response()->json([
                    "status" => 200,
                    "message" => "pasa"
                ]);
            } else {
                return response()->json([
                    "status" => 400,
                    "message" => "no pasa"
                ]);
            }
        }
    }
    public function checkAuth(Request $req)
    {

        if (Auth::guard('sanctum')->check()) {
            return response()->json([
                'status' => 200,
                'message' => 'Autenticado',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'No autenticado',
            ], 400);
        }
    }

    public function listReservas(Request $req)
    {
        $reservas = Reserva::all();
        if ($reservas) {
            return response()->json([
                "status" => 400,
                "message" => "No hay reservas",
                "data" => [],
            ], 400);
        } else {
            $cantidad = $reservas->count();
            return response()->json([
                "status" => 200,
                "message" => "Se encontraron $cantidad reservas",
                "data" => $reservas,
            ]);
        }
    }
    public function storeReservas(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            "nombre_huesped" => "required|string|max:255",
            "apellido_huesped" => "required|string|max:255",
            "tipo_identificacion_huesped" => "required|string|in:dni,carnet extranjeria",
            "identificacion_huesped" => "required|integer",
            "sexo_huesped" => "required|string|in:hombre,mujer",
            "fecha_nacimiento_huesped" => "required|date_format:d-m-Y",
            "nacionalidad_huesped" => "required|string",
            "region_huesped" => "required|string",
            "direccion_huesped" => "required|string",
            "telefono_huesped" => "required|integer",
            "correo_huesped" => "required|string|email|max:255|unique:users",
            "ruc_empresa" => "integer",
            "razon_social_empresa" => "string",
            "direccion_empresa" => "string",
            "fecha_reserva" => "required|required|date_format:d-m-Y H:i",
            "cantidad_dias_reserva" => "required|integer",
            "pax_reserva" => "required|integer",
            "nro_habitacion_reserva" => "required|integer",
            "tipo_habitacion_reserva" => "required|string",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors(),
            ], 400);
        }
        $dataIdentificacion = [
            "tipo_identificacion" => $request->tipo_identificacion_huesped,
            "identificacion_huesped" => $request->identificacion_huesped
        ];
        $dataEmpresa = [
            "ruc_empresa" => $request->ruc_empresa,
            "razon_social_empresa" => $request->razon_social_empresa,
            "direccion_empresa" => $request->direccion_empresa,
        ];
        $dataHuesped = [
            "nombre_huesped" => $request->nombre_huesped,
            "apellido_huesped" => $request->apellido_huesped,
            "identificacion" => $dataIdentificacion,
            "sexo" => $request->sexo_huesped,
            "fecha_nacimiento" => $request->fecha_nacimiento_huesped,
            "nacionalidad_huesped" => $request->nacionalidad_huesped,
            "region_huesped" => $request->region_huesped,
            "direccion_huesped" => $request->direccion_huesped,
            "telefono_huesped" => $request->telefono_huesped,
            "correo_huesped" => $request->correo_huesped,
            "empresa" => $dataEmpresa
        ];
        $dataHabitacion = [
            "nro_habitacion_reserva" => $request->nro_habitacion_reserva,
            "tipo_habitacion_reserva" => $request->tipo_habitacion_reserva,
        ];

        $dataReserva = [
            "fecha_reserva" => $request->fecha_reserva,
            "cantidad_dias_reserva" => $request->cantidad_dias_reserva,
            "pax_reserva" => $request->pax_reserva,
            "habitacion" => $dataHabitacion
        ];
        $data = [
            "datosHuesped" => $dataHuesped,
            "datosReserva" => $dataReserva
        ];
        $reserva = new Reserva;
        $reserva->datosHuesped = $data["datosHuesped"];
        $reserva->datosReserva = $data["datosReserva"];
        $reserva->save();
        return response()->json([
            'status' => 200,
            'message' => 'Reserva realizada con exito',
        ], 200);
    }

    public function listHabitaciones(Request $req)
    {
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

        if ($habitaciones->isNotEmpty()) {
            $cantidad = $habitaciones->count();
            return response()->json([
                "status" => 200,
                "message" => "Se encontraron $cantidad habitaciones",
                "data" => $habitaciones,
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "No hay Habitaciones",
                "data" => [],
            ], 400);
        }
    }
    public function listCheckOut()
    {
        $checksOut = Checkout::all();
        if ($checksOut) {
            $cantidad = $checksOut->count();
            return response()->json([
                "status" => 400,
                "message" => "Se encontraron $cantidad check outs",
                "data" => $checksOut
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "No hay Check Outs",
                "data" => [],
            ]);
        }
    }
    public function storeCheckOut(Request $request)
    {
        //
        //dd($request);
        $validator = Validator::make($request->all(), [
            "id_checkin" => "required|string",
            "id_recepcionista" => "required|string",
            "forma_pago" => "required|string",
            "estado_pago" => "required|string",
            "descripcion_salida" => "required|string",
            "fecha_salida" => "required|string",
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "message" => "No se pudo guardar el check out",
                "error" => $validator->errors()
            ], 400);
        }
        $checkin = Checkin::find($request->input("id_checkin"))->first();

        if ($checkin) {
            $checkin->estado = "pasado";
            $checkin->save();
        }

        $checkout = Checkout::create([
            "id_checkin" => $request->input("id_checkin"),
            "id_recepcionista" => $request->input("id_recepcionista"),
            "forma_pago" => $request->input("forma_pago"),
            "estado_pago" => $request->input("estado_pago"),
            "descripcion_salida" => $request->input("descripcion_salida"),
            "fecha_salida" => $request->input("fecha_salida"),
        ]);
        //return redirect()->route("administrador/check");
        return response()->json([
            "status" => 200,
            "message" => "Check Out realizado correctamente"
        ]);
        //dd($request);

    }
    public function storeCheckIn(Request $request)
    {
        //
        //dd($request);
        $validator = Validator::make($request->all(), [
            "id_huesped" => "required|integer|unique:users",
            "nro_habitacion" => "required|integer",
            "id_recepcionista" => "required|string",
            "tipo_reserva" => "required|string",
            "paxs" => "required|integer",
            "cantidad_dias" => "required|integer",
            "motivo_viaje" => "required|string",
            "fecha_ingreso" => "required|date",
            "nota_adicionales" => "required|string",
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "message" => "No se pudo guardar el check in",
                "error" => $validator->errors()
            ], 400);
        }
        $checkin = Checkin::create([
            "id_huesped" => $request->input("id_huesped"),
            "nro_habitacion" => $request->input("nro_habitacion"),
            "id_recepcionista" => $request->input("id_recepcionista"),
            "tipo_reserva" => $request->input("tipo_reserva"),
            "paxs" => $request->input("paxs"),
            "cantidad_dias" => $request->input("cantidad_dias"),
            "motivo_viaje" => $request->input("motivo_viaje"),
            "fecha_ingreso" => $request->input("fecha_ingreso"),
            "nota_adicionales" => $request->input("nota_adicionales"),
            "estado" => "active"
        ]);
        /* return redirect()->route("administrador/check"); */

        return response()->json([
            "status" => 200,
            "message" => "Check In realizado correctamente"
        ]);
    }
    public function listCheckIn()
    {
        //
        $checksIn = Checkin::all();
        if ($checksIn) {
            $cantidad = $checksIn->count();
            return response()->json([
                "status" => 400,
                "message" => "Se encontraron $cantidad check in",
                "data" => $checksIn
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "No se encontraron Check In",
                "data" => [],
            ], 400);
        }
    }
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8",
            "role" => "required|string|min:4",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "message" => "No se pudo registrar",
                "error" => $validator->errors()
            ], 400);
        }

        $user = Administrador::create(
            [
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "role" => $req->role,
                "phone" => $req->phone,
                "turno" => $req->turno,
                "lastName" => $req->lastName,
                "dni" => $req->dni,

            ]
        );
        $token = $user->createToken("token")->plainTextToken;

        //return redirect()->route("gerente/recepcionistas");
        return response()->json([
            "status" => 200,
            "message" => "Administrador creado correctamente"
        ]);
    }

    public function login(Request $req)
    {

        if (!Auth::attempt($req->only("email", "password"))) {

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);

        }
        $user = Administrador::where("email", $req["email"])->firstOrFail();

        $token = $user->createToken("token")->plainTextToken;
        $role = $user->role;
        return response()->json([
            "status" => 200,
            "message" => "Sesión Iniciada Correctamente",
            "token" => $token,
            "rol" => $role
        ])->header('Content-Type', 'application/json; charset=utf-8');;

    }

    public function logout()
    {

        // Borrar los datos de autenticación del guardia
        $guard = Auth::guard('sanctum');

        // Obtener el usuario autenticado
        $user = $guard->user();

        if ($user) {
            // Borrar todos los tokens de API del usuario
            $user->tokens()->delete();
        }
        Session::flush();
        return response()->json([
            "status" => 200,
            "message" => "Haz cerrado sesión correctamente"
        ]);
    }
}
