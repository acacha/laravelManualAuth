<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // DEPENDENCY INJECTION
    public function login(Request $request)
    {
        try {
            $user = User::where(
                ["email" => $request->input('email')])->firstOrFail();
        } catch (\Exception $e) {
            return redirect('login');
        }

        //SALTS
        if ( Hash::check($request->input('password'), $user->password) ) {
            return redirect('home');
        } else {
            return redirect('login');
        }

        // Obtenir de la base de dades l'usuari amb email --> Model User
        // Comprovar el password:
        // - Hash del password proporcionat (bcrypt)
        // - Comparar amb el de base de dades
        // ERROR   -> RETURN TO LOGIN PAGE
        // CORRECT -> REDIRECT TO HOME
//        echo "El login se procesa aquí";
    }
}
