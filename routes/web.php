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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'manualauth'], function () {
    Route::get('/tasques', function () {
        return view('tasques');
    });
    Route::get('home', function () {
        return "Home!";
    });
});



Route::get('/login', 'LoginController@showLoginForm');
Route::post('/login', 'LoginController@login');

//PAS 1? Middleware? Com protegir pàgines?

////Auth::loginUsingId(4);
//Auth::logout();
//
//Route::get('/home', 'HomeController@index');
//Route::get('/login', 'LoginController@showLoginForm');
//Route::post('/login', 'LoginController@login');
//
////Route::get('/register', 'RegisterController@register');

//PAS 2? User Providers Login /Register
