<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $table = 'likes';
    public $timestamps = true;
    //protected $primaryKey = 'id';

    protected $fillable = ['article', 'user'];

    public static function new($article, $user) {
        try {
            $res = self::create([
                "article" => $article,
                "user"    => $user
            ]);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("文章点赞失败", [$e->getMessage()]);
            return false;
        }
    }

    public static function likes($user) {
        try {
            $res = self::paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("收藏文章获取失败", [$e->getMessage()]);
            return false;
        }
    }
}
