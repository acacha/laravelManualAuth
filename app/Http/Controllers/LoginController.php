<?php

namespace App\Http\Controllers;

use App\Auth\Managers\AuthManager;
use App\ManualAuth\Guard;
use App\User;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{


//    public $username = "email";

    protected $guard;

    /**
     * LoginController constructor.
     * @param $guard
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    // DEPENDENCY INJECTION
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only(['email','password']);

        if ($this->guard->validate($credentials)) {
            //OK TODO
            $this->guard->setUser();
            return redirect('home');
        }

        return redirect('login');

//        $this->validate($request, [
//            'email' => 'required', 'password' => 'required',
//        ]);

        // Validate login form -> Required fields, response with errors, etc



        // Check too many attempts TODO

        // Delegar intent de autenticació a un altre i tenir en compte que poden
        // haver-hi diferents User Providers (SQL, Ldap...)
        //
        // OK ->
        //    CookieGuard / ParameterGuard o que!
        //    Redirect to home
        // NOT OK -> Redirect to login with error messages

    }

        //Validate Login Request (required fields, reponse with errors, etc)
        // Here or validate to Custom Request

        //Check for too many attempts and process response in case too many attempts
        // Delegate ->

        // Attempt login with credentials -> Attempt
        // Ok-> Redirect to login
        // Not ok -> 1) Increment login attempts 2) Return error response

//        $this->auth->guard()->validate($this->credentials($request));


//        try {
//            $user = User::where(
//                ["email" => $request->input('email')])->firstOrFail();
//        } catch (\Exception $e) {
//            return redirect('login');
//        }
//
//        //SALTS
//        if ( Hash::check($request->input('password'), $user->password) ) {
//            return redirect('home');
//        } else {
//            return redirect('login');
//        }

        // Obtenir de la base de dades l'usuari amb email --> Model User
        // Comprovar el password:
        // - Hash del password proporcionat (bcrypt)
        // - Comparar amb el de base de dades
        // ERROR   -> RETURN TO LOGIN PAGE
        // CORRECT -> REDIRECT TO HOME
//        echo "El login se procesa aquí";
//    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    private function validateLogin($request)
    {
        $this->validate($request, [
            'email' => 'email|required', 'password' => 'required',
        ]);
    }
}
