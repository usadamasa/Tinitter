<?php
namespace Tinitter\Controller;

class TimeLine
{
    public function show ()
    {
        $app = \Slim\Slim::getInstance();
        $app->render(
            'index.twig',
            ['display_text'=>"Hello, World!"]
        );
    }
}
