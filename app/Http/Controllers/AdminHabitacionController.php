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

    public function show()
    { }
}
