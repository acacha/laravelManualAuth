<?php

namespace App\Auth\Managers;

use App\Auth\Guards\SessionGuard;
use App\Auth\Providers\EloquentUserProvider;

class AuthManager
{
    public function guard()
    {
        return new SessionGuard(new EloquentUserProvider());
    }
}