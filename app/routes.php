<?php

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Http\Controllers\WelcomeController;

return function(App $app) {

    $app->get('/admin', function(Request $request, Response $response, $parameters) {
        $response->getBody()->write('SUPER USER ONLINE');

        return $response;
    });


    $app->get('/', [WelcomeController::class, 'index']);
    $app->get('/{name}', [WelcomeController::class, 'show']);

//    $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//        $name = $args['name'];
//        $response->getBody()->write("Hello, $name");
//        return $response;
//    });
//
//    $app->get('/home', function(Request $request, Response $response, $parameters) {
//        $response->getBody()->write('DELTA REPORTING');
//
//        return $response;
//    });

};