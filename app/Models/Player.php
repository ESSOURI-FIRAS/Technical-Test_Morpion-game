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

// Relations
public function gamesAsPlayer1()
{
    return $this->hasMany(Game::class, 'player1_id');
}

public function gamesAsPlayer2()
{
    return $this->hasMany(Game::class, 'player2_id');
}

public function actions()
{
    return $this->hasMany(Action::class);
}



}
