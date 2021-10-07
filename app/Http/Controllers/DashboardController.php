<?php

namespace App\Http\Controllers;

use App\Support\Auth;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class DashboardController
{
    public function show($request, $response): Response
    {
        $user = Auth::user();

        if ($user) {
            $renderer = new PhpRenderer(resources_path('views/dashboard'));

            return $renderer->render($response, "dashboard.php");
        }

        $renderer = new PhpRenderer(resources_path('views'));

        return $renderer->render($response, "welcome.php");
    }

    public function store($request, $response)
    {

    }
}