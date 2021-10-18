<?php

use App\Support\Route;
use App\Http\Middleware\ApiAuthMiddleware as ApiAuthentication;

// All routes are prefixed with api/ automatic
Route::get('/example', 'Api\ApiController@index')->add(ApiAuthentication::class);

// Post routes
Route::get('/post', 'Api\PostController@index')->add(ApiAuthentication::class);
Route::get('/post-form', 'Api\PostController@show')->add(ApiAuthentication::class);
Route::post('/post', 'Api\PostController@store')->add(ApiAuthentication::class);
