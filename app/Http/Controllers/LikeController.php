<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    /**
     * like a article
     */
    public function like(Request $request) {
        $article = $request['article'];
        $user = auth()->id;
        $res = Like::new($article,$user);
        return $res ?
            json_success('Like Success', null, 200) :
            json_fail('Like Fail', null, 100);
    }

    /**
     * now user likes list
     */
    public function likes() {
        $user = auth()->id;
        $res = Like::likes($user);

        return $res ?
            json_success('like list get Success', $res, 200) :
            json_fail('Like list get Fail', null, 100);
    }
}
