<?php

// load library
require '../vendor/autoload.php';

// initialize Slim
$app = new \Slim\Slim([]);

// dispatch root
\Tinitter\Route::registration($app);

// execute
$app->run();
