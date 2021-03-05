<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    // 图片id为0 可以表示没有图片
    public $table = 'imgs';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['path'];

    public static function upload($path){
        try {
            $res = self::create([
                "path" => $path
            ]);
            return $res ? $res->id : false;
        } catch (\Exception $e) {
            logError("Img File upload Failed", [$e->getMessage()]);
            return false;
        }
    }
}
