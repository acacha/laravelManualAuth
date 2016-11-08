<?php

namespace App\Http\Controllers;

use App\Auth\Managers\AuthManager;
use App\ManualAuth\Guard;
use App\ManualAuth\UserProviders\UserProvider;
use App\User;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{


//    public $username = "email";

    protected $guard;

    protected $userprovider;

    /**
     * LoginController constructor.
     * @param $guard
     * @param $userprovider
     */
    public function __construct(Guard $guard, UserProvider $userprovider)
    {
        $this->guard = $guard;
        $this->userprovider = $userprovider;
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    // DEPENDENCY INJECTION
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only(['email', 'password']);

        if ($this->guard->validate($credentials)) {
            $this->guard->setUser($this->userprovider->getUserByCredentials($credentials));
            return redirect('home');
        }

        Session::flash('errors', collect(["Login incorrecte"]));
        return redirect('login');
    }

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
