<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as App;
use App\Http\HttpKernel;

$app = App::create(new Container());

$_SERVER['app'] = &$app;

if (!function_exists('app'))
{
    function app()
    {
        return $_SERVER['app'];
    }
}

return HttpKernel::bootstrap($app)->getApplication();