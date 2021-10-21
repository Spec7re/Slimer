<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use App\Support\Auth;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class RegisterController
{
    public function show($request, $response): Response
    {
        $renderer = new PhpRenderer(resources_path('views/auth'));

        return $renderer->render($response, "register.php");
    }

    public function store($request, $response)
    {
        $requestData = $request->getParsedBody();
//        $requestData = json_decode(file_get_contents('php://input'), true);

        if ( ! isset($requestData['email'])) {
            dd('Email is required field for registration.');
        }

        if ($requestData['password'] != $requestData['confirm_password']) {
            dd('Password and Confirm password do not match!');
        }

        unset($requestData['confirm_password']);
        $password = sha1($requestData['password']);

        if (User::where('email', $requestData['email'])->exists()) {
            dd("User already with {$requestData['email']} already exists");
        }

        $user = new User();
        $user->first_name = $requestData['first_name'];
        $user->last_name  = $requestData['last_name'];
        $user->email = $requestData['email'];
        $user->password = $password;
        $user->save();

        Auth::attempt($user->email, $user->password);

        return $response->withStatus(302)->withHeader('Location', '/home');
    }
}