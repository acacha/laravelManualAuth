<?php

namespace App\Auth\Providers;

interface UserProvider {

    public function retrieveByCredentials(array $credentials);
    
}