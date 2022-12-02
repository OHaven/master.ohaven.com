<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class temp extends Controller
{

    public function index(){
$user = Auth::user();

if(strcmp($user->type, "user")){
    return redirect()->intended('htledash');
}

if(strcmp($user->type, "hotel")){
    return redirect()->intended('userdash');
}

}
}
