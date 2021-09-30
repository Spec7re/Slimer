<?php

use App\Support\Route;

Route::get('/', 'WelcomeController@index');
Route::get('/welcome/{name}', 'WelcomeController@show');

Route::get('/home', 'WelcomeController@home');