<?php
/**
 * Created by PhpStorm.
 * User: sergi
 * Date: 24/10/16
 * Time: 18:39
 */

namespace App\Auth\Providers;

use App\User;

class EloquentUserProvider implements UserProvider
{

    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials)) {
            return null;
        }
        return User::where(
                ["email" => $credentials['email']])->first();
    }
}