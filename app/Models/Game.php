<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    
    use HasFactory;

    protected $fillable = ['player1_id', 'player2_id', 'winner_id', 'status'];


    // Relation avec le joueur 1
    public function player1()
    {
        return $this->belongsTo(Player::class, 'player1_id');
    }

    // Relation avec le joueur 2
    public function player2()
    {
        return $this->belongsTo(Player::class, 'player2_id');
    }



    // Relation avec le gagnant
    public function winner()
    {
        return $this->belongsTo(Player::class, 'winner_id');
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
