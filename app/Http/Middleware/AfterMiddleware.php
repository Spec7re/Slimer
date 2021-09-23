<?php

namespace App\Http\Middleware;

use Slim\Psr7\Response;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Psr\Http\Message\ServerRequestInterface as Request;

class AfterMiddleware
{
    public function __invoke(Request $request, Handle $handler): Response
    {
            $response = $handler->handle($request);

            $response->getBody()->write("\n After Middleware");

            return $response;
    }
}