<?php
/**
 * Created by PhpStorm.
 * User: sergi
 * Date: 25/10/16
 * Time: 20:33
 */

namespace App\ManualAuth;

interface Guard
{
    public function check();

    public function validate(array $credentials);

    public function setUser($user);
}