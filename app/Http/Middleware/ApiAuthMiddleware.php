<?php

namespace App\Http\Middleware;

use Firebase\JWT\JWT;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handle;
use Slim\Psr7\Response;

class ApiAuthMiddleware
{
    public function __invoke(Request $request, Handle $handler)
    {
        $token = $request->getHeader('Authorization')[0] ?? '';
        $key = env("JWT_SECRET");
        $domain = env('APP_DOMAIN');
        $audience = '';

        if ( ! empty($token) ) {
            $token = str_replace( 'Bearer ', '', $token[0]);
        } elseif ( isset($_SESSION['Authorization']) ) {
            $sessionToken = json_decode($_SESSION["Authorization"], true);
            $token = $sessionToken['Bearer'];
        }

        if( ! empty($token) ) {
            $decoded = (array) JWT::decode($token, $key, array('HS256'));
            $audience = $decoded['aud'];
        }

        if ($domain == $audience) {
            return $handler->handle($request);
        } else {
            $response = new Response();
            return $response->withStatus(302)->withHeader('Location', '/home');
        }
    }
}