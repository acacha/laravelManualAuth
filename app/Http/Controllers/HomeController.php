<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Usuari{
    public $name,$sn1,$sn2;
}

class HomeController extends Controller
{
    public function index()
    {
//        $name = 'Victoria';
//        $data = ['username' => $name];
//        return view('home')->with('username','Victoria');

        $user = new Usuari();
        $user->name="Sergi";
        $user->sn1="Tur";
        $user->sn2="Badenas";

        return view('home')
            ->withUser($user);

    }
}
