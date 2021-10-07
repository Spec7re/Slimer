<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class WelcomeController
{

    public function index($request, $response): Response
    {
        $renderer = new PhpRenderer(resources_path('views'));

        return $renderer->render($response, "welcome.php");
    }

    public function show(Response $response, $name) : Response
    {
           $response->getBody()->write("Welcome {$name}");

           return $response;
    }

    public function report(Response $response) : Response
    {
        $response->getBody()->write('WELCOME CONTROLLER REPORTING');

        return $response;
    }
}