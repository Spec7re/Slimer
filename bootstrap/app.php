<?php

use App\Providers\ServiceProvider;
use DI\Container;
use DI\Bridge\Slim\Bridge as SlimAppFactory;

$app = SlimAppFactory::create(new Container());

ServiceProvider::setup($app, config('app.providers'));

return $app;