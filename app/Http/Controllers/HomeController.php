<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use PDO;

class HomeController extends Controller
{
    public function index()
    {
        //Passos controlador bàsic (glue/cola del model i vista):
        // 1) Aconseguir informació de l'usuari de la base de dades
        // 2) Mostrar vista home passant info del usuari

//        $user = User::find(1);

//        $user->name = "asdasd";
//        $pdo = new PDO('sqlite:/home/sergi/Code/laravelManualAuth/database/database.sqlite');
//        $query = $pdo->prepare('SELECT * FROM users WHERE id=1');
//        $query->execute();
//        $row = $query->fetch();
//        dd($row);

        $user = new \stdClass();
        $user->name = "Sergi Tur";
        return view('home')
            ->withUser($user);

    }
}
