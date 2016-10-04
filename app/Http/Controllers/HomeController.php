<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        //Passos controlador bàsic (glue/cola del model i vista):
        // 1) Aconseguir informació de l'usuari de la base de dades
        // 2) Mostrar vista home passant info del usuari

//        Auth::loginUsingId(1);
//        Auth::logout();

        // Middleware

        if (Auth::check()) {
            $user = User::find(1);
            return view('home')
                ->withUser($user);
        }else {
            $user = new \stdClass();
            $user->name = "Invitado";
            return view('home')
                ->withUser($user);
        }


    }
}
