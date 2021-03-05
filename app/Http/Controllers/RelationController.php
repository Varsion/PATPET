<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relation;

class RelationController extends Controller
{
    /**
     * one follow another one
     */
    public function new(Request $request){
        $follower = auth()->id;
        $followed = $request['user'];

        $res = Relation::new($follower,$followed);

        return $res ?
            json_success('关注成功', null, 200) :
            json_fail('关注失败', null, 100);
    }

    /**
     * now user followed list
     */
    public function all(){
        $follower = auth()->id;
        $res = Relation::follows($follower);

        return $res ?
            json_success('关注列表获取成功', $res, 200) :
            json_fail('关注列表获取失败', null, 100);

    }
}
