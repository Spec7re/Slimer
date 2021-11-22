<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

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