<?php

namespace App\ManualAuth;

use App\ManualAuth\UserProviders\UserProvider;

class CookieGuard implements Guard
{
    protected $provider;

    /**
     * CookieGuard constructor.
     * @param $provider
     */
    public function __construct(UserProvider $provider)
    {
        $this->provider = $provider;
    }


    public function check()
    {
        return isset($_COOKIE['user']) ? true : false;
    }

    public function validate(array $credentials)
    {
        return $this->provider->validate($credentials);
    }

    public function setUser($user)
    {
        setcookie('user',$user->token);
    }
}