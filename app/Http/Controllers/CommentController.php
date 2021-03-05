<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * the comments for the article
     */
    public function all(Request $request) {
        $article = $request['article'];

        $res = Comment::all_comments($article);

        return $res ?
            json_success('Comment list get Success', $res, 200) :
            json_fail('Comment list get Fail or No Comments about this', null, 100);
    }

    /**
     * new comments
     */
    public function new(Request $request) {
        $author = auth()->id;
        //$author = 1;
        $article = $request['article'];
        $comment = $request['comment'];

        $res = Comment::new($author,$article,$comment);

        return $res ?
            json_success('Comment add Success', null, 200) :
            json_fail('Comment add Fail', null, 100);
    }
}
