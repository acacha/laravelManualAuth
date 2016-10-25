<?php


namespace App\Auth\Guards;


use App\Auth\Providers\EloquentUserProvider;

class SessionGuard implements Guard
{
    protected $provider;

    /**
     * SessionGuard constructor.
     * @param $provider
     */
    public function __construct(EloquentUserProvider $provider)
    {
        $this->provider = $provider;
    }

    public function user()
    {
        $id = $this->session->get($this->getName());
        if (! is_null($id)) {
            return $this->provider->retrieveById($id);
        }
    }
    public function validate(array $credentials)
    {
//        dd($credentials);

        // Get user from user provider using credentials

        $user = $this->provider->retrieveByCredentials($credentials);

        //dd($user);
        if ($this->hasValidCredentials($user, $credentials)) {
            //Login allowed -> Set user at session
            $this->login($user);
            return true;
        }

        //Others -> Event:

        //Login incorrect
        return false;
    }

    protected function hasValidCredentials($user, $credentials)
    {
        return ! is_null($user) && $this->provider->validateCredentials($user, $credentials);
    }
}