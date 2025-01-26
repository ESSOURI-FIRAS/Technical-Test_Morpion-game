<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    
    use HasFactory;

    protected $fillable = ['player1_id', 'player2_id', 'winner_id', 'status'];


    public function gamesAsPlayer1()
    {
        return $this->hasMany(Game::class, 'player1_id');
    }

    public function gamesAsPlayer2()
    {
        return $this->hasMany(Game::class, 'player2_id');
    }


    public function winner()
    {
        return $this->belongsTo(Player::class, 'winner_id');
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
