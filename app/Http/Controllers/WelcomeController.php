<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

class WelcomeController
{

    public function index(Response $response)
    {
            $response->getBody()->write('WELCOME CONTROLLER REPORTING');

            return $response;
    }

    public function show(Response $response, $name)
    {
           $response->getBody()->write("Welcome {$name}");

           return $response;
    }
}