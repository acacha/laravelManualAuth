<?php

return [
    'guard' => \App\ManualAuth\CookieGuard::class,
    'user'  => \App\ManualAuth\UserProviders\EloquentUserProvider::class
];