<?php

namespace App\Http\Controllers;

use App\Support\Auth;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class DashboardController
{
    public function show($request, $response): Response
    {
        return $response->withStatus(200);
    }

    public function store($request, $response)
    {

    }
}