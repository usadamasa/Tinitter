<?php
namespace Tinitter;

class Route{
    static function registration($app){
        // use CSRF Guard
        $app->add( new \Slim\Extras\Middleware\CsrfGuard() );

        // トップページ
        $app->get('/', '\Tinitter\Controller\TimeLine:show');

        // 投稿一覧表示
        $app->get('/page/:page_num', '\Tinitter\Controller\TimeLine:show');

        // 新規投稿
        $app->post('/post/commit', '\Tinitter\Controller\Post:commit');
    }
}
