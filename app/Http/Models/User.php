<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable  = [
        'first_name', 'last_name', 'email'
    ];

    protected $guarded = [
        'password'
    ];
}