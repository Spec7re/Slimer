<?php
/*
 *  Autoload dependencies
 * */
require __DIR__ . '/../vendor/autoload.php';

/*
 *  Boot the app AKA turn on the lights
 * */
$app = require __DIR__ . '/../bootstrap/app.php';

/*
 * Run app
 * */
$app->run();