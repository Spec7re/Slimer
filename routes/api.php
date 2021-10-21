<?php

use App\Support\Route;
use App\Http\Middleware\ApiAuthMiddleware as ApiAuthentication;

// All routes are automatically prefixed with api/
Route::get('/example', 'Api\ApiController@index');

// Post routes
Route::get('/post', 'Api\PostController@index')->add(ApiAuthentication::class);
Route::get('/post-form', 'Api\PostController@show')->add(ApiAuthentication::class);
Route::post('/post', 'Api\PostController@store')->add(ApiAuthentication::class);
Route::get('/get-posts', 'Api\PostController@getPosts')->add(ApiAuthentication::class);
