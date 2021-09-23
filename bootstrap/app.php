<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as App;
use App\Http\HttpKernel;

$app = App::create(new Container());

return HttpKernel::bootstrap($app)->getApplication();