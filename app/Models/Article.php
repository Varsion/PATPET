<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['*'];

    public static function all_article($tag){
        try {
            $res = self::join("tags as tag","articles.tag","tag.id")
                        ->join("users as user", "articles.author", "user.id")
                        ->select("articles.title", "articles.pic", "user.name as user", "tag.name as tag")
                        ->where("articles.tag",$tag)
                        ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("文章列表获取失败", [$e->getMessage()]);
            return false;
        }
    }

    public static function user_article($user){
        try {
            $res = self::join("tags as tag", "articles.tag", "tag.id")
                        ->join("users as user", "articles.author", "user.id")
                        ->select("articles.title", "articles.pic", "user.name as user", "tag.name as tag")
                        ->where("articles.author", $user)
                        ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("用户文章列表获取失败", [$e->getMessage()]);
            return false;
        }
    }

    public static function search($key) {
        try {
            $res = self::join("tags as tag", "articles.tag", "tag.id")
                ->join("users as user", "articles.author", "user.id")
                ->select("articles.title", "articles.pic", "user.name as user", "tag.name as tag")
                ->where("articles.title", "like", $key)
                ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("文章搜索失败", [$e->getMessage()]);
            return false;
        }
    }

    public static function new_article($author, $title, $pic_id, $tag, $content){
        try {
            $res = self::create([
                "pic" => $pic_id,
                "title"=>$title,
                "author" => $author,
                "tag" => $tag,
                "content" => $content
            ]);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("文章新建失败", [$e->getMessage()]);
            return false;
        }
    }

}
