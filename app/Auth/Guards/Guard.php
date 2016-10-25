<?php

namespace App\Auth\Guards;


interface Guard
{
    public function validate(array $credentials);
}