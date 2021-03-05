<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['*'];
}