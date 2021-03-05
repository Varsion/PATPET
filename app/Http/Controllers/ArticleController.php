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
            json_success('Article list get Success', $res, 200) :
            json_fail('Article list get Fail', null, 100);
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
            json_success('Article list get Success', $res, 200) :
            json_fail('Article list get Fail', null, 100);
    }

    /**
     * Search Articles
     */
    public function search(Request $request) {
        $key = $request["keyword"];

        $res = Article::search($key);

        return $res ?
            json_success('Serach Success', $res, 200) :
            json_fail('Serach Fail or None about this', null, 100);

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
            json_success('Artcile release Success', null, 200) :
            json_fail('Artcile release Fail', null, 100);
    }

}
