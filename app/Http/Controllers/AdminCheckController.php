<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Checkin;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class AdminCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        //dd($req);
        $checksIn=Checkin::where("estado","active")->get();
        $checksOut=Checkout::all();
/*         $client = new Client();
        $response = $client->get('https://127.0.0.1:8000/api/reserva');
        $data = json_decode($response->getBody(), true); */
        return view('view_recepcionista/checks/check',['checksin' => $checksIn,'checksout'=>$checksOut]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        //dd($req->input("reservas"));
        $user=Auth::user();
        $reservas=$req->input("id");
        //dd($user);
        $client = new Client();
        $response = $client->get('https://fcc9-190-232-27-74.ngrok-free.app/api/reserva');
        $data = json_decode($response->getBody(), true);
        //dd($data);
        foreach($data as $data1){
            
            if($data1["_id"]==$reservas){
                $datosReserva=$data1;
            }
        }
        return view('view_recepcionista/checks/form',["reservas"=>$reservas,"user"=>$user,"data"=>$datosReserva]);
    }
    public function create2(Request $req)
    {
        //
        //dd($req->input("reservas"));
        $user=Auth::user();
        $id=$req->input("id");
        $response = Checkin::find($id);
        //dd($response);
        return view('view_recepcionista/checks/checkOutForm',["data"=>$response,"user"=>$user]);
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
