<?php

use App\Support\Route;
use App\Http\Middleware\ApiAuthMiddleware as ApiAuthentication;

// All routes are automatically prefixed with api/
Route::get('/example', 'Api\ApiController@index');

// Post routes
Route::post('/post', 'Api\PostController@store')->add(ApiAuthentication::class);
Route::get('/get-posts', 'Api\PostController@getPosts')->add(ApiAuthentication::class);
