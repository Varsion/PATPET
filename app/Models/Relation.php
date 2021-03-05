<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    public $table = 'relations';
    public $timestamps = true;
    //protected $primaryKey = 'id';

    protected $fillable = ['follower_id','followed_id'];
}
