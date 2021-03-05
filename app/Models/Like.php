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
            logError("Article Like Failed", [$e->getMessage()]);
            return false;
        }
    }

    public static function likes($user) {
        try {
            $res = self::join("articles as article", "article.id", "likes.article")
                        ->join("tags as tag", "article.tag", "tag.id")
                        ->join("users as user", "article.author", "user.id")
                        ->join("imgs as img", "img.id", "article.pic")
                        ->select("article.id", "article.title", "img.path", "user.name as username", "tag.name as tag")
                        ->where("likes.user",$user)
                        ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Likes' Article get Failed", [$e->getMessage()]);
            return false;
        }
    }
}
