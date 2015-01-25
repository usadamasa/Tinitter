<?php

namespace Tinitter\Test;

use Tinitter\Model\Post as M_Post;

class Farming
{
    // 内容のランダムなダミー投稿を指定された件数行う
    public static function farmingPost($num)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i<$num; $i++) {
            $post           = new M_Post();
            $post->nickname = $faker->firstname;
            $post->body     = $faker->paragraph(2);
            $post->save();
        }
    }
}
