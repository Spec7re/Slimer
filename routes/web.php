<?php

use App\Support\Route;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware as RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfGuestMiddleware as RedirectIfGuest;

Route::get('/', 'WelcomeController@index');
Route::get('/report', 'WelcomeController@report')->add(RedirectIfGuest::class);
Route::get('/welcome/{name}', 'WelcomeController@show');

Route::get('/login', 'LoginController@show')->add(RedirectIfAuthenticated::class);
Route::post('/login', 'LoginController@store')->add(RedirectIfAuthenticated::class);
Route::get('/logout', 'LoginController@logout')->add(RedirectIfGuest::class);

Route::get('/home', 'DashboardController@show')->add(RedirectIfGuest::class);

Route::get('/register', 'RegisterController@show')->add(RedirectIfAuthenticated::class);
Route::post('/register', 'RegisterController@store')->add(RedirectIfAuthenticated::class);