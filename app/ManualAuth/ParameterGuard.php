<?php

namespace App\ManualAuth;


use Illuminate\Http\Request;

class ParameterGuard implements Guard
{
    protected $request;

    /**
     * ParameterGuard constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function check()
    {
        if ($this->request->has('id')) {
            return true;
        }
        return false;
    }

    public function validate(array $credentials)
    {
        return true;
    }

    public function setUser($user)
    {
        // TODO: Implement setUser() method.
    }
}