<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    public $table = 'relations';
    public $timestamps = true;
    //protected $primaryKey = 'id';

    protected $fillable = ['follower','followed'];

    public static function new($follower, $followed)
    {
        try {
            $res = self::create([
                "follower" => $follower,
                "followed" => $followed
            ]);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Follow Failed", [$e->getMessage()]);
            return false;
        }
    }

    public static function follows($follower) {
        try {
            $res = self::join('users as user','relations.followed','user.id')
                        ->join('imgs as img','user.avatar','img.path')
                        ->select('user.id', 'user.name','img.path as avatar')
                        ->where('relations.follower',$follower)
                        ->paginate(12);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Follow list get Failed", [$e->getMessage()]);
            return false;
        }
    }
}
