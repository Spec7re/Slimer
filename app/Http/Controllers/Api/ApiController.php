<?php

namespace App\Http\Controllers\Api;

use Slim\Psr7\Response;
use App\Http\Models\User;

class ApiController
{
    public function index(Response $response, User $user)
    {

        $user = $user->get()->last();

        $response->getBody()->write(json_encode($user, JSON_PRETTY_PRINT));

        return $response;
    }
}