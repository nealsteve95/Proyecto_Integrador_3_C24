<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GerenteHomeController extends Controller
{
    //
    public function home(){
        $user = Auth::user();

        //dd($user);
        return view("view_gerente/index",compact('user'));
    }
}
