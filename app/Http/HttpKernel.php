<?php

namespace App\Http;

use Boot\Foundation\HttpKernel as FoundationHttpKernel;

class HttpKernel extends FoundationHttpKernel
{
    /*
     * Global Middleware
     * */
    public array $middleware = [
//        Middleware\BeforeMiddleware::class,
//        Middleware\AfterMiddleware::class,
    ];

    /*
     * Route Group Middleware
     * */
    public array $middlewareGroups = [
        'api' => [],
        'web' => [],
    ];

}