<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Closures : funcions anomins
//
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
});

Route::get('/login', function() {
    return view('auth.login');
});

Route::get('/register', function() {
    return view('auth.register');
});

//var hola = function hola () {
//    echo "hola!";
//}
//
//Route::get('/hola', hola );

//class Route {
//    public static function get($uri, )
//}