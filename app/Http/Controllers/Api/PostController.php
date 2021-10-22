<?php

namespace App\Http\Controllers\Api;

use App\Http\Models\Post;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class PostController
{
    public function index($request, $response): Response
    {
        $renderer = new PhpRenderer(resources_path('views/post'));

        return $renderer->render($response, "post-index.php");
    }

    public function show($request, $response): Response
    {
        $renderer = new PhpRenderer(resources_path('views/post'));

        return $renderer->render($response, "post-form.php");
    }

    public function store($request, $response): Response
    {
        $requestData = $request->getParsedBody();
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

        return $response->withStatus(302)->withHeader('Location', '/api/post');
    }

    public function getPosts($request, $response) : Response
    {
        $posts = Post::latest('created_at')->get();

        $response->getBody()->write(json_encode($posts, JSON_PRETTY_PRINT));

        return $response;
    }
}