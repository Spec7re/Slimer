<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\Support\Auth;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class RegisterController
{
    public function show($response): Response
    {

        return $response->withStatus(200);
//        $renderer = new PhpRenderer(resources_path('views/auth'));
//
//        return $renderer->render($response, "register.php");
    }

    public function store($response)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        if (empty($requestData['email'])) {
            $payload = json_encode([
                "status" => 'error',
                "message" => "Email is required field for registration."
                ]);
            $response->getBody()->write($payload);
            return $response;
        }

        if ( empty($requestData['password']) || $requestData['password'] != $requestData['confirmPassword']) {
            $payload = json_encode([
                "status" => 'error',
                "message" => "Password and Confirm password do not match!"
                ]);
            $response->getBody()->write($payload);
            return $response;
        }

        unset($requestData['confirmPassword']);
        $password = sha1($requestData['password']);

        if (User::where('email', $requestData['email'])->exists()) {
            $payload = json_encode([
                "status" => 'error',
                "message" => "User already with {$requestData['email']} already exists"
                ]);
            $response->getBody()->write($payload);
            return $response;
        }

        $user = new User();
        $user->first_name = $requestData['firstName'];
        $user->last_name  = $requestData['lastName'];
        $user->email = $requestData['email'];
        $user->password = $password;
        $user->save();

        Auth::attempt($user->email, $user->password);

        $payload = json_encode([
            "status" => 'success',
            "message" => "User created!"
            ]);
        $response->getBody()->write($payload);
        return $response;
    }
}