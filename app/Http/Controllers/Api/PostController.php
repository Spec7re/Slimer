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
            dd('Only logged users can create posts!');
        }

        if (empty($requestData['title'])) {
            dd('Title is required field for posts.');
        }

        if (empty($requestData['text'])) {
            dd('Content is required field for posts.');
        }

        $post = new Post();
        $post->user_id = $loggedUser['id'];
        $post->title = $requestData['title'];
        $post->content = $requestData['text'];
        $post->save();

        return $response->withStatus(302)->withHeader('Location', '/api/post');
    }
}