<?php

namespace App\Http\Controllers;

use App\Support\Auth;
use Slim\Views\PhpRenderer;

class LoginController
{
    public function show($response)
    {
        $renderer = new PhpRenderer(resources_path('views/auth'));

        return $renderer->render($response, "login.php");
    }

    public function store($request, $response)
    {
        $requestData = $request->getParsedBody();
        $email = $requestData['email'];
        $password = sha1($requestData['password']);

        $successful = Auth::attempt($email, $password);
        if ( ! $successful ) {
            dd('Authentication failed!');
        }

        return $response->withStatus(302)->withHeader('Location', '/home');
    }

        public function logout($response)
    {
        Auth::logout();

        if (Auth::guest()) {
            return $response->withStatus(302)->withHeader('Location', '/login');
        }
    }
}