<?php

namespace App\Http\Middleware;

use App\Support\Auth;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handle;

class RedirectIfAuthenticatedMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        if (Auth::check()) {
            $response = new Response();
            return $response->withStatus(302)->withHeader('Location', '/home');
        }
        return $handler->handle($request);
    }
}