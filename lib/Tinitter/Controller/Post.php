<?php
namespace Tinitter\Controller;
use \Tinitter\Model\Post as M_Post;

class Post
{
    public function commit()
    {
       $app = \Slim\Slim::getInstance();
       $params = $app->request->params();

       $post = new M_Post;
       $post->nickname  = $params['nickname'];
       $post->body      = $params['body'];
       $post->save();

       $app->redirect('/');
    }
}
