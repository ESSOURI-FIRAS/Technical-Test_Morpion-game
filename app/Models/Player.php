<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Player extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'pseudo',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


}
