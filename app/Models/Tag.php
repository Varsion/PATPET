<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tags';
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $fillable = ['name'];
}
