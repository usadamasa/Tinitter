<?php

namespace TestCase\Model;

use Tinitter\Model\Post as M_Post;

class PostTest extends \Tinitter\Test\Base
{
    // Postを生成して取得できるか
    public function testPostCreate()
    {
        // 1件保存する
        $post           = new M_Post();
        $post->nickname = 'nickname';
        $post->body     = 'body';
        $post->save();

        // 保存されたか確認する
        $id        = $post->id;
        $same_post = M_Post::findOrFail($id);
        $this->assertEquals($same_post->nickname , 'nickname');
        $this->assertEquals($same_post->body     , 'body');
    }

    // ページ指定で取得できるか
    public function testGetByPage()
    {
        // 投稿を生成
        \Tinitter\Test\Farming::farmingPost(35);

        list($post_list, $next_page_is_exist) = M_Post::getByPage(10, 1);
        $this->assertCount(10, $post_list);
        $this->assertTrue($next_page_is_exist);

        // 最終ページは余った投稿
        list($post_list, $next_page_is_exist) = M_Post::getByPage(10, 4);
        $this->assertCount(5, $post_list);
        $this->assertFalse($next_page_is_exist);

        // 存在しないページ
        list($post_list, $next_page_is_exist) = M_Post::getByPage(10, 5);
        $this->assertCount(0, $post_list);
        $this->assertFalse($next_page_is_exist);
    }
}
