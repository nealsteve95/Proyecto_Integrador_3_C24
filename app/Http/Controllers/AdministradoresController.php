<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;

class AdministradoresController extends Controller
{
    /**
     * functions
     * index -> mostrar todos los administradores
     * store -> guardar administrador
     * delete -> eliminar administrador
     * show -> mostrar administrador para actualizar
     * update -> actualizar administrador
     */
    public function index() {

        // Obtenemos todos los administradores
        $recepcionistas = Administrador::where('role', 'admin')->get();

        // Redirecciona a la vista index con todos los administradores para listarlos
        return view('view_gerente.recepcionistas.index', ['recepcionistas' => $recepcionistas]);
    }
    public function store(Request $request) {
        $administrador = new Administrador;

        $administrador->name = $request->nombres;
        $administrador->lastName = $request->apellidos;
        $administrador->turno = $request->turno;
        $administrador->phone = $request->telefono;
        $administrador->email = $request->correo;
        $administrador->dni = $request->dni;
        $administrador->password = $request->contrasena;
        $administrador->role = $request->permisos;

        $administrador->save();

        return redirect()->route('gerente/recepcionistas')->with('success', 'Administrador creado');
    }
    public function delete($id) {

        // Eliminamos al administrador con id de request
        Administrador::destroy($id);

        // Reidreccionamos a la ruta de lista index
        return redirect()->route('gerente/recepcionistas')->with('success', 'Administrador eliminado');
    }
    public function show($id) {

        // Extraemos el administrador buscado
        $administrador = Administrador::find($id);

        // Reidreccionamos a la ruta de show con información del administrador
        return view('view_gerente.recepcionistas.show', ['administrador'=>$administrador]);
    }
    public function update(Request $request, $id) {

        // Obtenemos al administrador a actualizar
        $administrador = Administrador::find($id);

        // Actualizamos campos
        $administrador->nombres = $request->nombres;
        $administrador->apellidos = $request->apellidos;
        $administrador->turno = $request->turno;
        $administrador->telefono = $request->telefono;
        $administrador->dni = $request->dni;
        $administrador->permisos = $request->permisos;

        // Guardamos objeto
        $administrador->save();

        // Redireccionamos a la ruta de index
        return redirect()->route('gerente/recepcionistas-show', ['id'=>$administrador->id])->with('success', 'Administrador actualizado');
    }
    public function updateUser(Request $request, $id) {

        // Obtenemos al administrador a actualizar
        $administrador = Administrador::find($id);

        // Actualizamos campos
        $administrador->correo = $request->correo;

        if($request->contrasena != null) {
            $administrador->contrasena = $request->contrasena;
        }

        // Guardamos objeto
        $administrador->save();

        // Redireccionamos a la ruta de index
        return redirect()->route('gerente/recepcionistas-show', ['id'=>$administrador->id])->with('success', 'Administrador actualizado');
    }
}
