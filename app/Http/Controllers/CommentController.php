<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function all(Request $request) {
        $article = $request['article'];

        $res = Comment::all_comments($article);

        return $res ?
            json_success('评论获取成功', $res, 200) :
            json_fail('评论获取失败或没有评论', null, 100);
    }

    public function new(Request $request) {
        $author = auth()->id;
        $article = $request['article'];
        $comment = $request['comment'];

        $res = Comment::new($author,$article,$comment);

        return $res ?
            json_success('评论成功', $res, 200) :
            json_fail('评论失败', null, 100);
    }
}
