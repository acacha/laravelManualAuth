<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //S SOLID
        //SRP: Single Responsability Principle
        //Passos controlador bàsic (glue/cola del model i vista):
        // 1) Aconseguir informació de l'usuari de la base de dades
        // 2) Mostrar vista home passant info del usuari
        $user = Auth::user();
        return view('home')
            ->withUser($user);
    }
}
