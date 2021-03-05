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
            json_success('点赞成功', null, 200) :
            json_fail('点赞失败', null, 100);
    }

    /**
     * now user likes list
     */
    public function likes() {
        $user = auth()->id;
        $res = Like::likes($user);

        return $res ?
            json_success('搜藏列表获取成功', $res, 200) :
            json_fail('搜藏列表获取失败', null, 100);
    }
}
