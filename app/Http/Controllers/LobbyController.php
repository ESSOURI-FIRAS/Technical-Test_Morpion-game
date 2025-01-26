<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LobbyController extends Controller
{
   // Afficher la vue  lobby
   public function index(Request $request)
   {
       // Récupérerle joueur connecté

       $player = $request->user();

       // Récupérer tous les joueurs connectés (exemple simple)
       $players = Player::all();

       // Récupérer les parties en attente
       //$games = Game::where('status', 'waiting')->get();

       // Récupérer les parties en attente avec les relations chargées
       $games = Game::with(['player1', 'player2'])->where('status', 'waiting')->get();

       //  passer le joueur à la vue
       return view('lobby', ['player' => $player],compact('players','games'));
   }

    


    // Créer une nouvelle partie
    public function createGame(Request $request)
    {
        $game = Game::create([
            'player1_id' => Auth::id(),
            'status' => 'waiting',
        ]);

        return redirect()->route('games.show', $game->id);
    }

   

}


// {{ route('games.create') }} hethi nèottoha fel vue lobby mba3ed