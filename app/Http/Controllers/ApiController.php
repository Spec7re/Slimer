<?php

namespace App\Http\Controllers;

use Slim\Psr7\Response;

class ApiController
{
    public function index(Response $response)
    {
        $response->getBody()->write(json_encode([
            'Hello' => 'World'
        ], JSON_PRETTY_PRINT));

        return $response;
    }
}