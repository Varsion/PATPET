<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['*'];


}
