<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['author', 'article', 'comment'];

    public static function all_comments($article) {
        try {
            $res = self::join('users as user', 'user.id', 'comments.author')
                        ->join('imgs as img', 'user.avatar', 'img.id')
                        ->select('user.name', 'img.path', 'comments.comment', 'comments.created_at', 'comments.author')
                        ->where('comments.article',$article)
                        ->orderBy('comments.created_at','asc')
                        ->get();
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Article Comments get Failed", [$e->getMessage()]);
            return false;
        }
    }

    public static function new($author, $article, $comment){
        try {
            $res = self::create([
                "author" => $author,
                "article" => $article,
                "comment" => $comment
            ]);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Comment creation Filed", [$e->getMessage()]);
            return false;
        }
    }
}
