<?php

use App\Support\Route;

Route::get('/', 'WelcomeController@index');
Route::get('/report', 'WelcomeController@report');
Route::get('/welcome/{name}', 'WelcomeController@show');

Route::get('/login', 'LoginController@show');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@logout');

Route::get('/home', 'DashboardController@show');

Route::get('/register', 'RegisterController@show');
Route::post('/register', 'RegisterController@store');