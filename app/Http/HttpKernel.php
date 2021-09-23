<?php

namespace App\Http;

use App\Http\Middleware\AfterMiddleware;
use App\Http\Middleware\BeforeMiddleware;
use Boot\Foundation\HttpKernel as FoundationHttpKernel;

class HttpKernel extends FoundationHttpKernel
{
    /*
     * Global Middleware
     * */
    public array $middleware = [
        BeforeMiddleware::class,
        AfterMiddleware::class,
    ];

    /*
     * Route Group Middleware
     * */
    public array $middlewareGroups = [
        'api' => [],
        'web' => [],
    ];

}