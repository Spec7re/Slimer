<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class WelcomeController
{

    public function index(Response $response) : Response
    {
            $response->getBody()->write('WELCOME CONTROLLER REPORTING');

            return $response;
    }

    public function show(Response $response, $name) : Response
    {
           $response->getBody()->write("Welcome {$name}");

           return $response;
    }

    public function home($request, $response): Response
    {
            $renderer = new PhpRenderer(resources_path('views'));

            return $renderer->render($response, "index.html");
    }
}