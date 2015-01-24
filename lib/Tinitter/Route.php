<?php
namespace Tinitter;

class Route{
    static function registration($app){
        // トップページ
        $app->get('/', '\Tinitter\Controller\TimeLine:show');

        // 新規投稿
        $app->post('/post/commit', '\Tinitter\Controller\Post:commit');
    }
}
