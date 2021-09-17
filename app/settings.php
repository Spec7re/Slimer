<?php

use Psr\Container\ContainerInterface;

/*
 * Return callback function with settings array
 * Param: $container interface
 *
 * */
return function(ContainerInterface $container) {
    $container->set('settings', function() {
        return [
            'displayErrorDetails' => true,
            'logErrors' => true,
            'logErrorDetails' => true,
        ];
    });
};