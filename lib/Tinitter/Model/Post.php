<?php
namespace Tinitter\Model;

class Post extends \Illuminate\Database\Eloquent\Model
{
    public static function getByPage($per_page, $page_num)
    {
        // スキップする件数を計算
        $offset = $per_page * ($page_num - 1);

        // 投稿を取得、次ページの存在判定用に1件多く取得
        $post_list = static::orderBy('id', 'DESC')
            ->take($per_page + 1)
            ->skip($offset)
            ->get()
            ->all();

        // 次ページの存在チェック
        if (count($post_list) > $per_page) {
            array_pop($post_list); // 確認用の最後一件を捨てる
            $next_page_is_exist = true;
        } else {
            $next_page_is_exist = false;
        }

        return [$post_list, $next_page_is_exist];
    }
}
