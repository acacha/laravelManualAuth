<?php

namespace App\ManualAuth;


class CookieGuard implements Guard
{

    /**
     * CookieGuard constructor.
     */
    public function __construct()
    {

    }

    public function check()
    {
        return isset($_COOKIE['user']) ? true : false;
    }
}