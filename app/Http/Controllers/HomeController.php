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

        $this->setUserCookie();

        //ESTAT SESSIÓ
        if ($this->userIsAuthenticated()) {
            $user = $this->getUser();
            return view('home')
                ->withUser($user);
        } else {
            return redirect('login');
        }

    }


    private function setUserCookie() {
        $user = User::findOrFail(1);;
        setcookie('user',$user->token);
    }

    private function getUser()
    {
        //Opció 1 : query string $_GET
        $token = $_COOKIE['user'];
        return User::where(["token" => $token])->first();
    }

    private function userIsAuthenticated()
    {
        //Operador ternari
        return isset($_COOKIE['user']) ? true : false;

//        if(isset($_COOKIE['user'])) {
//            return true;
//        } else {
//            return false;
//        }
    }
}
