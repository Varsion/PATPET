<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * All Articles by Tag
     */
    public function all(Request $request) {
        $tag = 0;
        if($request['tag']) {
            $tag = $request['tag'];
        }

        $res = Article::all_article($tag);

        return $res ?
            json_success('文章列表获取成功', $res, 200) :
            json_fail('文章列表获取失败', null, 100);
    }

    /**
     * on user's or other user's
     */
    public function users(Request $request) {
        $user = auth()->id;
        if ($request['user']) {
            $user = $request['user'];
        }
        $res = Article::user_article($user);

        return $res ?
            json_success('文章列表获取成功', $res, 200) :
            json_fail('文章列表获取失败', null, 100);
    }

    /**
     * Search Articles
     */
    public function search(Request $request) {
        $key = $request["keyword"];

        $res = Article::search($key);

        return $res ?
            json_success('搜索成功', $res, 200) :
            json_fail('搜索失败或没有相关内容', null, 100);

    }

    /**
     * New Article
     */
    public function new(Request $request) {
        $author = auth()->id;
        $pic_id = 0;
        if ($request["pic"]) {
            $pic_id = self::upload($request["pic"]);
        }
        $title = $request["title"];
        $tag = $request['tag'];
        $content = $request['content'];

        $res = Article::new_article($author,$title,$pic_id,$tag,$content);

        return $res ?
            json_success('文章发布成功', null, 200) :
            json_fail('文章发布失败', null, 100);
    }

}
