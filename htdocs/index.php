<?php

// CSRF Guard用にセッションを開始
session_start();

// load config
require '../config.php';

// load library
require '../vendor/autoload.php';

// setup DB connection
\Base\DB::registerIlluminate($db_settings);

// initialize Slim
$app = new \Slim\Slim([
    'templates.path'    => TEMPLATES_DIR_PATH,
    'view'              => new \Slim\Views\Twig()
]);

// dispatch root
\Tinitter\Route::registration($app);

// execute
$app->run();
