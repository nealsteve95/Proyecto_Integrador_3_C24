<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Huesped;

class Huesped_R_Controller extends Controller
{
    /**
     * functions
     * index -> mostrar todos los huespedes
     * store -> guardar huesped
     * delete -> eliminar huesped
     * show -> mostrar huesped para actualizar
     * update -> actualizar huesped
     */
    public function index() {

        // Obtenemos todos los empleados
        $huespedes = Huesped::all();

        // Redirecciona a la vista index con todos los empleados para listarlos
        return view('view_recepcionista.huespedes.index', ['huespedes' => $huespedes]);
    }

    public function store(Request $request) {
        
        $huesped = new Huesped;

        $huesped->nombres = $request->nombres;
        $huesped->apellidos = $request->apellidos;
        $huesped->tipo_identificacion = $request->tipo_identificacion;
        $huesped->identificacion = $request->identificacion;
        $huesped->sexo = $request->sexo;

        $fecha_nacimiento = Carbon::createFromFormat('Y-m-d', $request->fecha_nacimiento)->toDateString();
        $huesped->fecha_nacimiento = $fecha_nacimiento;

        $huesped->nacionalidad = $request->nacionalidad;
        $huesped->region_direccion = $request->region_direccion;
        $huesped->telefono = $request->telefono;
        $huesped->correo = $request->correo;

        $huesped->empresa = [
            [
                'RUC' => $request->RUC,
                'razon_social' => $request->razon_social,
                'direccion_empresa' => $request->direccion_empresa
            ]
        ];
        
        $huesped->save();

        return redirect()->route('recepcionista/huespedes')->with('success', 'Huesped creado');
    }

    public function delete($id) {

        // Eliminamos al huesped con id de request
        Huesped::destroy($id);

        // Reidreccionamos a la ruta de lista index
        return redirect()->route('recepcionista/huespedes')->with('success', 'Huesped eliminado');
    }   

    public function show($id) {

        // Extraemos el huesped buscado
        $huesped = Huesped::find($id);

        // Reidreccionamos a la ruta de show con información del huesped
        return view('view_recepcionista.huespedes.show', ['huesped'=>$huesped]);
    }
    public function update(Request $request, $id) {

        // Obtenemos al huesped a actualizar
        $huesped = Huesped::find($id);

        // Actualizamos campos
        $huesped->nombres = $request->nombres;
        $huesped->apellidos = $request->apellidos;
        $huesped->tipo_identificacion = $request->tipo_identificacion;
        $huesped->identificacion = $request->identificacion;      
        $huesped->sexo = $request->sexo;
        
        $fecha_nacimiento = Carbon::createFromFormat('Y-m-d', $request->fecha_nacimiento)->toDateString();
        $huesped->fecha_nacimiento = $fecha_nacimiento;

        $huesped->nacionalidad = $request->nacionalidad;
        $huesped->region_direccion = $request->region_direccion;
        $huesped->telefono = $request->telefono;
        $huesped->correo = $request->correo;
        // Guardamos objeto
        $huesped->save();

        // Redireccionamos a la ruta de index
        return redirect()->route('recepcionista/huespedes')->with('success', 'Huesped actualizado');
    }
    public function updateEmpresa(Request $request, $id) {

        // Obtenemos al administrador a actualizar
        $huesped = Huesped::find($id);

        // Actualizamos campos
        $huesped->empresa = [
            [
                'RUC' => $request->RUC,
                'razon_social' => $request->razon_social,
                'direccion_empresa' => $request->direccion_empresa
            ]
        ];

        // Guardamos objeto
        $huesped->save();

        // Redireccionamos a la ruta de index
        return redirect()->route('recepcionista/huespedes-show', ['id'=>$huesped->id])->with('success', 'Empresa actualizado');
    }
}
