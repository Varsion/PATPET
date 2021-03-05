<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $table = 'likes';
    public $timestamps = true;
    //protected $primaryKey = 'id';

    protected $fillable = ['path'];
}
