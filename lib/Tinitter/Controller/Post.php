<?php
namespace Tinitter\Controller;

use Tinitter\Model\Post as M_Post;
use Tinitter\Validator\Post as V_Post;

class Post
{
    public function commit()
    {
        $app        = \Slim\Slim::getInstance();
        $params     = $app->request->params();
        $error_list = V_Post::byArray($params);

        if (!empty($error_list)) {
            $app->render(
                'TimeLine/show.twig',
                [
                    'params'     => $params,
                    'error_list' => $error_list
                ]
           );

            return;
        }
        $post           = new M_Post();
        $post->nickname = $params['nickname'];
        $post->body     = $params['body'];
        $post->save();

        $app->redirect('/');
    }
}
