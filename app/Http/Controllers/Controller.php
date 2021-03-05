<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Img;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*
     * 转存图片
     * @Author Varsion
     * @params file
     * @return int $pic_id
     */ 
    public static function upload($pic){
        $path = $pic->store('public');
        $res = str_replace('public/','storage/',$path);
        $pic_id = Img::upload($res);
        return $pic_id ? $pic_id : false ;
    }
}
