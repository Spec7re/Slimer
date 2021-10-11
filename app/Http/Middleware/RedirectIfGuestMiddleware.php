<?php

namespace App\Http\Middleware;

use App\Support\Auth;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Slim\Psr7\Response as Response;

class RedirectIfGuestMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        if (Auth::guest()) {
            $response = new Response();
           return $response->withStatus(302)->withHeader('Location', '/');
        }
        return $handler->handle($request);
    }
}