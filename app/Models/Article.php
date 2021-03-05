<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ["pic","title","author","tag","content"];

    public static function all_article($tag){
        try {
            $res = self::join("tags as tag","articles.tag","tag.id")
                        ->join("users as user", "articles.author", "user.id")
                        ->join("imgs as img", "img.id", "articles.pic")
                        ->select("articles.id", "articles.title", "img.path", "user.name as username", "tag.name as tag")
                        ->where("articles.tag",$tag)
                        ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Article list get Failed.", [$e->getMessage()]);
            return false;
        }
    }

    public static function getinfo($article) {
        try {
            $res = self::join("tags as tag", "articles.tag", "tag.id")
                        ->join("users as user", "articles.author", "user.id")
                        ->join("imgs as img", "img.id", "articles.pic")
                        ->select("articles.id", "articles.title", "img.path", "articles.content", "user.name as username", "tag.name as tag")
                        ->where("articles.id", $article)
                        ->get();
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Article info get Failed.", [$e->getMessage()]);
            return false;
        }
    }

    public static function user_article($user){
        try {
            $res = self::join("tags as tag", "articles.tag", "tag.id")
                        ->join("users as user", "articles.author", "user.id")
                        ->join("imgs as img", "img.id", "articles.pic")
                        ->select("articles.id", "articles.title", "img.path", "user.name as username", "tag.name as tag")
                        ->where("articles.author", $user)
                        ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("User's Article list get Failed.", [$e->getMessage()]);
            return false;
        }
    }

    public static function search($key) {
        try {
            $res = self::join("tags as tag", "articles.tag", "tag.id")
                        ->join("users as user", "articles.author", "user.id")
                        ->join("imgs as img", "img.id", "articles.pic")
                        ->select("articles.id", "articles.title", "img.path", "user.name as username", "tag.name as tag")
                        ->where("articles.title", "like", '%'.$key.'%')
                        ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Article Search Failed", [$e->getMessage()]);
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
            logError("Article Creation Failed", [$e->getMessage()]);
            return false;
        }
    }

}
