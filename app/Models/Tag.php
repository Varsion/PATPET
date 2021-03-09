<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tags';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public static function tags(){
        try {
            $res = self::all();
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Tag list get Failed", [$e->getMessage()]);
            return false;
        }
    }

    public static function new($tag){
        try {
            $res = self::create([
                "name" => $tag
            ]);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("Tag Create Failed", [$e->getMessage()]);
            return false;
        }
    }

}
