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
        $follower = auth("user")->user()->id;
        $followed = $request['user'];

        $res = Relation::new($follower,$followed);

        return $res ?
            json_success('Follow Success', null, 200) :
            json_fail('Follow Fail', null, 100);
    }

    /**
     * now user followed list
     */
    public function all(){
        $follower = auth("user")->user()->id;
        $res = Relation::follows($follower);

        return $res ?
            json_success('Follow list get Success', $res, 200) :
            json_fail('Follow list get Fail', null, 100);

    }
}
