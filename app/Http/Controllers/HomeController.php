<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::find(1);

//        $user->name = "asdasd";

        return view('home')
            ->withUser($user);

    }
}
