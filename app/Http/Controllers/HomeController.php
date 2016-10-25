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
        return view('home');


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


}
