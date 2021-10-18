<?php use App\Support\Auth; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Slim Delta</title>
        <!--<link rel="shortcut icon" type="image/jpg" href="--><?php //require __DIR__ . '/./../img/dark-favicon.png' ?><!--"/>-->
    </head>
<body>
    <!-- NAVIGATION BAR -->
    <div>
        <div id="app" class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">Delta</span>
                </a>
                <ul class="nav nav-pills">
                    <?php if (Auth::user()): ?>
                    <li class="nav-item"><a href="/home" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="/api/post" class="nav-link">Posts</a></li>
                    <?php endif; ?>
                    <?php if (Auth::guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </header>
        </div>
    </div>