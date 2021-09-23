<?php

namespace Boot\Foundation;

use Boot\Foundation\Bootstrappers\Bootstrapper;

class HttpKernel extends Kernel
{

    /*
     * Global Middleware
     * */
    public array $middleware = [];

    /*
     * Route Group Middleware
     * */
    public array $middlewareGroups = [
        'api' => [],
        'web' => [],
    ];

    public array $bootstrap = [
        Bootstrappers\LoadEnvironmentVariables::class, // First the variables, cause following classes expect them.
        Bootstrappers\LoadDebuggingPage::class,
        Bootstrappers\LoadHttpMiddleware::class,
        Bootstrappers\LoadServiceProviders::class,
    ];
}