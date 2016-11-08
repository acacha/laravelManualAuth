<?php

namespace App\ManualAuth;

interface Guard
{
    public function check();

    public function validate(array $credentials);

    public function setUser($user);
}