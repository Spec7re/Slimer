<?php

use App\Support\Route;
use App\Http\Middleware\ApiAuthMiddleware as ApiAuthentication;

Route::get('/example', 'Api\ApiController@index')->add(ApiAuthentication::class);