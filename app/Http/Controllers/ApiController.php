<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Habitacion;
use App\Models\Huesped;
use App\Models\Reserva;

class ApiController extends Controller
{
    //
    public function listaReservaFromOne(Request $req,$id){
        $reservas = Reserva::where("id_huesped",$id)->with("huesped")->with("habitacion")->get();
        if($reservas->isEmpty()){
            return response()->json([
                "status"=>400,
                "message"=>"No se encontraron reservas",
            ],400);
        }
        return response()->json([
            "status"=>200,
            "message"=>"Se encontraron reservas",
            "data"=>$reservas
        ]);
    }
    public function actualizarHuespedes(Request $req, $id)
    {
        // Validación de los datos de entrada
        $validator = Validator::make($req->all(), [
            "nombre_huesped" => "required|string|max:255",
            "apellido_huesped" => "required|string|max:255",
            "tipo_identificacion_huesped" => "required|string|in:DNI,Identificacion Extranjera",
            "identificacion_huesped" => "required|integer",
            "sexo_huesped" => "required|string|in:masculino,femenino",
            "fecha_nacimiento_huesped" => "required|date_format:Y-m-d",
            "nacionalidad_huesped" => "required|string",
            "region_huesped" => "required|string",
            "direccion_huesped" => "required|string",
            "telefono_huesped" => "required|integer",
            "correo_huesped" => "required|string|email|max:255|unique:users",
            "nombre_empresa" => "max:255",
            "ruc_empresa" => "max:255",
            "razon_social_empresa" => "max:255",
            "direccion_empresa" => "max:255",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => "Revisa tus datos",
                'error' => $validator->errors(),
            ], 400);
        }

        $huesped = Huesped::find($id);

        if (!$huesped) {
            return response()->json([
                'status' => 404,
                'message' => 'Huesped no encontrado',
            ], 404);
        }

        $huesped->update([
            "identificacion" => [
                "tipo_identificacion" => $req->input("tipo_identificacion_huesped"),
                "identificacion_huesped" => $req->input("identificacion_huesped")
            ],
            "nombres" => $req->input("nombre_huesped"),
            "apellidos" => $req->input("apellido_huesped"),
            "sexo" => $req->input("sexo_huesped"),
            "fecha_nacimiento" => $req->input("fecha_nacimiento_huesped"),
            "nacionalidad" => $req->input("nacionalidad_huesped"),
            "region" => $req->input("region_huesped"),
            "direccion" => $req->input("direccion_huesped"),
            "telefono" => $req->input("telefono_huesped"),
            "correo" => $req->input("correo_huesped"),
            "empresa" => [
                "nombre_empresa" => $req->input("nombre_empresa"),
                "ruc_empresa" => $req->input("ruc_empresa"),
                "razon_social" => $req->input("razon_social_empresa"),
                "direccion_empresa" => $req->input("direccion_empresa")
            ]
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Datos del huésped actualizados con éxito',
            'data' => $huesped
        ], 200);
    }


    public function listarHuespedes()
    {
        $huespedes = Huesped::all();
        if ($huespedes) {
            $cantidad = $huespedes->count();
            return response()->json([
                "status" => 200,
                "message" => "Se han encontrado $cantidad huespedes",
                "data" => $huespedes
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "No se han encontrado huespedes"
            ], 400);
        }
    }
    public function deleteRecepcionista(Request $req)
    {
        $id = $req->id;

        $deleted = Administrador::destroy($id);

        if ($deleted) {
            return response()->json([
                'status' => 200,
                'message' => 'Recepcionista eliminado correctamente',
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Recepcionista no encontrado',
            ], 400);
        }
    }
    public function listRecepcionistas(Request $req)
    {
        $administradores = Administrador::where('rol', 'admin')->get();
        if ($administradores) {
            $cantidad = $administradores->count();
            return response()->json([
                "status" => 200,
                "message" => "Se han encontrado $cantidad recepcionistas",
                "data" => $administradores
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "No se han encontrado recepcionistas",
                "data" => []
            ], 400);
        }
    }
    public function createHuesped(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "nombre_huesped" => "required|string|max:255",
            "apellido_huesped" => "required|string|max:255",
            "tipo_identificacion_huesped" => "required|string|in:Dni,Carnet Extranjeria",
            "identificacion_huesped" => "required|integer",
            "sexo_huesped" => "required|string|in:Masculino,Femenino",
            "fecha_nacimiento_huesped" => "required|date_format:Y-m-d",
            "nacionalidad_huesped" => "required|string",
            "region_huesped" => "required|string",
            "direccion_huesped" => "required|string",
            "telefono_huesped" => "required|integer",
            "correo_huesped" => "required|string|email|max:255|unique:users",
            "nombre_empresa" => "max:255",
            "ruc_empresa" => "max:255",
            "razon_social" => "max:255",
            "direccion_empresa" => "max:255",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => "Revisa tus datos",
                'error' => $validator->errors(),
            ], 400);
        }
        $huesped = Huesped::create([
            "identificacion" => array(
                "tipo_identificacion" => $req->input("tipo_identificacion_huesped"),
                "identificacion_huesped" => $req->input("identificacion_huesped")
            ),
            "nombres" => $req->input("nombre_huesped"),
            "apellidos" => $req->input("apellido_huesped"),
            "sexo" => $req->input("sexo_huesped"),
            "fecha_nacimiento" => $req->input("fecha_nacimiento_huesped"),
            "nacionalidad" => $req->input("nacionalidad_huesped"),
            "region" => $req->input("region_huesped"),
            "direccion" => $req->input("direccion_huesped"),
            "telefono" => $req->input("telefono_huesped"),
            "correo" => $req->input("correo_huesped"),
            "empresa" => array(
                "nombre_empresa" => $req->input("nombre_empresa"),
                "ruc_empresa" => $req->input("ruc_empresa"),
                "razon_social" => $req->input("razon_social_empresa"),
                "direccion_empresa" => $req->input("direccion_empresa")
            )
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Huesped registrado con exito',
            'data' => $huesped
        ], 200);
    }
    public function getHuesped(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "tipo" => "required|string|in:dni,id,extranjero",
            "id" => "required|string",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => "Parametro incorrecto",
                'error' => $validator->errors(),
            ], 400);
        }
        if ($req->tipo == "dni") {
            $id = $req->id;
            $huesped = Huesped::where('identificacion.identificacion_huesped', $id)
                ->where('identificacion.tipo_identificacion', 'DNI')
                ->first();

            if ($huesped) {
                return response()->json([
                    "status" => 200,
                    "message" => "Se encontro 1 huesped",
                    "data" => $huesped
                ]);
            } else {
                return response()->json([
                    "status" => 400,
                    "message" => "No se encontraron huespedes con el id: $id",
                    "data" => []
                ], 400);
            }
        } else if ($req->tipo == "extranjero") {
            $id = $req->id;
            $huesped = Huesped::where('identificacion.identificacion_huesped', $id)
                ->where('identificacion.tipo_identificacion', 'Identificacion Extranjera')
                ->first();

            if ($huesped) {
                return response()->json([
                    "status" => 200,
                    "message" => "Se encontro 1 huesped",
                    "data" => $huesped
                ]);
            } else {
                return response()->json([
                    "status" => 400,
                    "message" => "No se encontraron huespedes con el id: $id",
                    "data" => []
                ], 400);
            }
        } else {
            $id = $req->id;
            $huesped = Huesped::find($id);
            if ($huesped) {
                return response()->json([
                    "status" => 200,
                    "message" => "Se encontro 1 huesped",
                    "data" => $huesped
                ]);
            } else {
                return response()->json([
                    "status" => 400,
                    "message" => "No se encontraron huespedes con el id: $id",
                    "data" => []
                ], 400);
            }
        }
    }
    public function getUser(Request $req)
    {
        $user = Auth::guard('sanctum')->user();
        if ($user) {
            return response()->json([
                "status" => 200,
                "message" => "Bienvenido",
                "data" => $user
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "Error",
                "data" => []
            ], 400);
        }
    }
    public function checkAuthRole(Request $req)
    {
        if ($req->input("role") == "gerente") {
            if (Auth::guard('sanctum')->check() && Auth::guard('sanctum')->user()->rol == "gerente") {
                return response()->json([
                    "status" => 200,
                    "message" => "Autorizado"
                ]);
            } else {
                return response()->json([
                    "status" => 400,
                    "message" => "No Autorizado"
                ], 400);
            }
        } else if ($req->input("role") == "admin") {
            if (Auth::guard('sanctum')->check() && Auth::guard('sanctum')->user()->rol == "admin") {
                return response()->json([
                    "status" => 200,
                    "message" => "Autorizado"
                ]);
            } else {
                return response()->json([
                    "status" => 400,
                    "message" => "No Autorizado"
                ], 400);
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
        $query = Reserva::query();

        //$reservas = Reserva::all();

        if ($req->has("id")) {
            $query->where("_id", $req->input("id"));
        }
        $reservas = $query->with('huesped')->get();

        if ($reservas->isNotEmpty()) {
            $cantidad = $reservas->count();
            return response()->json([
                "status" => 200,
                "message" => "Se encontraron $cantidad reservas",
                "data" => $reservas,
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "No hay Reservas",
                "data" => [],
            ], 400);
        }
    }
    public function storeReservas(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [

            "id_huesped" => "required|string|unique:users",
            "fecha_reserva" => "required|date_format:d-m-Y H:i",
            "cantidad_dias_reserva" => "required|integer",
            "pax_reserva" => "required|integer",
            "id_habitacion_reserva" => "required|string",
            "tipo_reserva"=>"required|string",
            "razon_hospedaje"=>"required|string",
            "destinatario_reserva"=>"required|string",
            "hora_llegada"=>"required|string",

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors(),
            ], 400);
        }


        $dataReserva = [
            "fecha_reserva" => $request->fecha_reserva,
            "cantidad_dias_reserva" => $request->cantidad_dias_reserva,
            "pax_reserva" => $request->pax_reserva,
            "tipo_reserva"=>$request->tipo_reserva,
            "razon_hospedaje"=>$request->razon_hospedaje,
            "destinatario_reserva"=>$request->destinatario_reserva,
            "peticiones_adicionales"=>$request->peticiones_adicionales,
            "hora_llegada"=>$request->hora_llegada
            
        ];
        $reserva = Reserva::create([
            "id_huesped" => $request->id_huesped,
            "datosReserva" => $dataReserva,
            "id_habitacion" => $request->id_habitacion_reserva,
        ]);
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
    public function listCheckIn(Request $req)
    {
        //
        $query = Checkin::query();

        if ($req->has("id")) {
            $query->where("_id", $req->input("id"));
        }
        $checkin = $query->get();

        if ($checkin->isNotEmpty()) {
            $cantidad = $checkin->count();
            return response()->json([
                "status" => 200,
                "message" => "Se encontraron $cantidad habitaciones",
                "data" => $checkin,
            ]);
        } else {
            return response()->json([
                "status" => 400,
                "message" => "No hay Check in",
                "data" => [],
            ], 400);
        }
    }
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            "nombres" => "required|string|max:255",
            "apellidos" => "required|string|max:255",
            "dni" => "required|string|max:8",
            "turno" => "required|string|max:20",
            "telefono" => "required|integer",
            "correo" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8",
            "rol" => "required|string|min:4",
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
                "nombres" => $req->nombres,
                "apellidos" => $req->apellidos,
                "email" => $req->correo,
                "password" => Hash::make($req->password),
                "rol" => $req->rol,
                "telefono" => $req->telefono,
                "turno" => $req->turno,
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

            return response()->json([
                "status" => 400,
                "message" => "Credenciales Incorrectas",
            ], 400);
        }
        $user = Administrador::where("email", $req["email"])->firstOrFail();

        $token = $user->createToken("token")->plainTextToken;
        $role = $user->rol;
        return response()->json([
            "status" => 200,
            "message" => "Sesión Iniciada Correctamente",
            "token" => $token,
            "rol" => $role
        ])->header('Content-Type', 'application/json; charset=utf-8');;
        //$cookie = cookie('token', $token, 60);
        //$url = route('administrador/home');
        //return redirect($url)->withCookie(cookie('token', $cookie, $minutes = 60, $path = null, $domain = null, $secure = true, $httpOnly = true));
        //$url = route('gerente/home');
        //return redirect($url)->withCookie(cookie('token', $cookie, $minutes = 60, $path = null, $domain = null, $secure = true, $httpOnly = true));

    }

    public function logout()
    {
        // Borrar los datos de autenticación del guardia
        $guard = Auth::guard('sanctum');

        $user = $guard->user();

        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });

        Session::flush();
        return response()->json([
            "status" => 200,
            "message" => "Haz cerrado sesión correctamente"
        ]);
    }
}
