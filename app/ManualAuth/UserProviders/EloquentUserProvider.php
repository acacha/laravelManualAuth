<?php

namespace App\ManualAuth\UserProviders;

use App\User;
use Hash;

class EloquentUserProvider implements UserProvider
{

    public function validate(array $credentials)
    {
        $user = $this->getUserByCredentials($credentials);

        if(!$user) {
            return false;
        }
        //SALTS
        if ( Hash::check($credentials['password'], $user->password) ) {
            return true;
        }

        return false;
    }

    public function getUserByCredentials(array $credentials)
    {
        try {
            return User::where(
                ["email" => $credentials['email']])->firstOrFail();
        } catch (\Exception $e) {
            return false;
        }
    }
}