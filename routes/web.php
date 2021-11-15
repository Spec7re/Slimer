<?php

use App\Support\Route;
use App\Http\Middleware\RedirectIfAuthenticatedMiddleware as RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfGuestMiddleware as RedirectIfGuest;

Route::get('/', 'WelcomeController@index');
Route::get('/report', 'WelcomeController@report')->add(RedirectIfGuest::class);
Route::get('/welcome/{name}', 'WelcomeController@show');

Route::get('/login', 'LoginController@show');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@logout');

Route::get('/home', 'DashboardController@show');

Route::get('/register', 'RegisterController@show');
Route::post('/register', 'RegisterController@store');

// POST views
Route::get('/post', 'Api\PostController@index');
Route::get('/post-form', 'Api\PostController@show');