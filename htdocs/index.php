<?php

// load library
require '../vendor/autoload.php';

// initialize Slim
$app = new \Slim\Slim([]);

// dispatch root
$app->get('/', function () {
    echo "Hello, world";
});

// execute
$app->run();
