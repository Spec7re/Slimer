<?php

namespace App\Http\Controllers;

use App\Support\Auth;
use Slim\Views\PhpRenderer;

class LoginController
{
    public function show($response)
    {
        return $response->withStatus(200);
//        $renderer = new PhpRenderer(resources_path('views/auth'));
//
//        return $renderer->render($response, "login.php");
    }

    public function store($request, $response)
    {
        $requestData =  json_decode(file_get_contents('php://input'), true);
        $email = $requestData['email'];
        $password = sha1($requestData['password']);

        $getToken = Auth::attempt($email, $password);
        if ( ! $getToken ) {
            $payload = json_encode([
                "status" => 'error',
                "message" => "Incorrect email or password!"
            ]);
            $response->getBody()->write($payload);
            return $response;
        }

        $payload = json_encode([
            "status" => 'success',
            "message" => "User logged in successfully!",
            "data" => $getToken
        ]);
        $response->getBody()->write($payload);
        return $response;
    }

    public function logout($response)
    {
        Auth::logout();

        if (Auth::guest()) {
            return $response->withStatus(302)->withHeader('Location', '/login');
        }
    }
}