<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends \Illuminate\Foundation\Auth\User implements JWTSubject,Authenticatable
{
    use Notifiable;

    public $table = 'users';
    protected $rememberTokenName = NULL;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return self::getKey();
    }


    public static function createUser($array = [])
    {
        try {
            return self::create($array) ?
                true :
                false;
        } catch (\Exception $e) {
            logError("User Create Failed", [$e->getMessage()]);
            return false;
        }
    }


    public static function getUserInfo($UserId, $array = [])
    {
        try {
            $res = self::select('*')
                        ->where('id',$UserId)
                        ->get();
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("User Info get Failed", [$e->getMessage()]);
            return null;
        }
    }

    public static function edit($avatar,$id,$name,$desc){
        try {
            $res = self::where('id',$id)
                        ->update([
                            'avatar'        => $avatar,
                            'name'          => $name,
                            'introduction'  => $desc
                        ]);
            return $res ? $res : false;
        } catch (\Exception $e) {
            logError("User Info get Failed", [$e->getMessage()]);
            return null;
        }
    }
}
