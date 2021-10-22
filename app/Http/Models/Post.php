<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = true;

    protected $fillable  = [
        'title', 'body',
    ];

    protected $hidden = [];
}