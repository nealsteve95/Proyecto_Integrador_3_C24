<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ReservaController extends Controller
{
    public function index(){
        // Obtener todas las reservas
        //$reservas = Reserva::all();
        $client = new Client();
        $response = $client->get('https://fcc9-190-232-27-74.ngrok-free.app/api/reserva');
        $data = json_decode($response->getBody(), true);
        //dd($data);
        return view('view_recepcionista.reservas.index',['reservas' => $data]);
    }

    public function show($id) {

        // Extraemos el huesped buscado
        $reservas = Reserva::find($id);
        
        // Reidreccionamos a la ruta de show con información de la habitación
        return view('view_recepcionista.reservas.show', ['reservas'=>$reservas]);
    }

    public function delete($id) {

        // Eliminamos al administrador con id de request
        Reserva::destroy($id);

        // Reidreccionamos a la ruta de lista index
        return redirect()->route('administrador/reservas')->with('success', 'Reserva eliminada');
    }





}

   




