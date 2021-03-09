<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function all() {
        $res = Tag::tags();

        return $res ?
            json_success('Tag list get Success', $res, 200) :
            json_fail('Tag list get Failed', null, 100);
    }

    public function add(Request $request) {
        $tag = $request['tag'];
        $res = Tag::new($tag);
        return $res ?
            json_success('Tag Create Success', null, 200) :
            json_fail('Tag Create Failed', null, 100);
    }
}
