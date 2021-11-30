<?php

namespace App\Http\Controllers\Api;

use App\Http\Models\Post;
use Psr\Http\Message\ResponseInterface as Response;

class PostController
{
    public function index($request, $response): Response
    {
        return $response->withStatus(200);
    }

    public function show($request, $response): Response
    {
        return $response->withStatus(200);
    }

    public function store($request, $response): Response
    {
        $requestData = json_decode(file_get_contents('php://input'), true);
        $loggedUser  = $request->getAttribute('user');

        if(empty($loggedUser)) {
            $payload = json_encode([
                "status" => 'error',
                "message" => "Only logged users can create posts!"
            ]);
            $response->getBody()->write($payload);
            return $response;
        }

        if (empty($requestData['title'])) {
            $payload = json_encode([
                "status" => 'error',
                "message" => "Title is required field for posts."
            ]);
            $response->getBody()->write($payload);
            return $response;
        }

        if (empty($requestData['body'])) {
            $payload = json_encode([
                "status" => 'error',
                "message" => "Content is required field for posts."
            ]);
            $response->getBody()->write($payload);
            return $response;
        }

        $post = new Post();
        $post->user_id = $loggedUser['id'];
        $post->title = $requestData['title'];
        $post->body = $requestData['body'];
        $post->save();

        $payload = json_encode([
            "status" => 'success',
            "message" => "Post created!"
        ]);
        $response->getBody()->write($payload);
        return $response;
    }

    public function getPosts($request, $response) : Response
    {
        $posts = Post::latest('created_at')->paginate(5, ['*'], 'page', $_GET['page']);

        $response->getBody()->write(json_encode($posts, JSON_PRETTY_PRINT));

        return $response;
    }
}