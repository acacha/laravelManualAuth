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
        //S SOLID
        //SRP: Single Responsability Principle
        //Passos controlador bàsic (glue/cola del model i vista):
        // 1) Aconseguir informació de l'usuari de la base de dades
        // 2) Mostrar vista home passant info del usuari

        //ESTAT SESSIÓ
        if ($this->userIsAuthenticated()) {
            $user = $this->getUser();
            return view('home')
                ->withUser($user);
        } else {
            return redirect('login');
        }

//        '{"name" : "Sergi","sn1" : "Tur"}'

    }

    private function getUser()
    {
        //Opció 1 : query string $_GET
        $id = $_GET['user'];
        return User::findOrFail($id);
    }

    private function userIsAuthenticated()
    {

        if(isset($_GET['user'])) {
            return true;
        } else {
            return false;
        }
    }
}
