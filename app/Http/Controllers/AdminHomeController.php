<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    //
    public function home(){
        $user = Auth::user();
        return view('view_recepcionista/index', compact('user'));
    }
}
