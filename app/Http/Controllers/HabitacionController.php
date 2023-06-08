<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class HabitacionController extends Controller
{
    public function index() {

        // Obtener todas las habitaciones
        $habitaciones = Habitacion::all();

        // Retornar vista de index
        return view('view_gerente.habitaciones.index', ['habitaciones' => $habitaciones]);
    }
    public function store(Request $request) {
        // Creacion de un nuevo objeto
        $habitacion = new Habitacion;

        // Estableciendo datos
        $habitacion->nro_habitacion = $request->nro_habitacion;
        $habitacion->tipo_habitacion = $request->tipo;
        $habitacion->precio = $request->precio;
        $habitacion->estado = $request->estado;
        $habitacion->caracteristicas = $request->caracteristicas;

        // Guardando objeto
        $habitacion->save();

        // Redirección a ruta de index
        return redirect()->route('gerente/habitaciones')->with('success', 'Habitacion creada');
    }
    public function delete($id) {

        // Eliminamos según el id
        Habitacion::destroy($id);

        // Redirección a ruta de index
        return redirect()->route('gerente/habitaciones')->with('success', 'Habitacion eliminada');
    }
    public function show($id) {

        // Extraemos el huesped buscado
        $habitacion = Habitacion::find($id);

        // Reidreccionamos a la ruta de show con información de la habitación
        return view('view_gerente.habitaciones.show', ['habitacion'=>$habitacion]);
    }
    public function update(Request $request, $id) {

        // Obtenemos la habitacion a actualizar
        $habitacion = Habitacion::find($id);

        // Actualizamos campos
        $habitacion->nro_habitacion = $request->nro_habitacion;
        $habitacion->tipo = $request->tipo;
        $habitacion->precio = $request->precio;
        $habitacion->estado = $request->estado;
        $habitacion->caracteristicas = $request->caracteristicas;

        // Guardamos objeto
        $habitacion->save();

        // Redireccionamos a la ruta de index
        return redirect()->route('gerente/habitaciones')->with('success', 'Habitacion actualizada');
    }
}
