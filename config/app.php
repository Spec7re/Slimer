<?php

return [
    'providers' => [
        \App\Providers\DatabaseServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
    ],
    'aliases' => [
        'DB' => \Illuminate\Database\Capsule\Manager::class,
    ]
];