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

       if ($games->isEmpty()) {
        return view('lobby', [
            'player' => $player,
            'players' => $players,
            //'games' => [],
        ]);
        }
    return view('lobby', [
        'player' => $player,
        'players' => $players,
        'games' => $games,
    ]);
      
   }

    


    // Créer une nouvelle partie
    public function createGame(Request $request)
    {
        $game = Game::create([
            'player1_id' => Auth::id(),
            'status' => 'waiting',
        ]);

        return redirect()->route('games.show', ['id' => $game->id]);
    }

    public function joinGame(Game $game)
    {
        // Vérifier si la partie est déjà commencée
        if ($game->player2_id) {
            return redirect()->route('lobby')->with('error', 'La partie a déja commencée !');
        }

        // Ajouter le deuxième joueur
        $game->update([
            'player2_id' => Auth::id(),
            'status' => 'in_progress', // Passer la partie en "en cours"
        ]);
        // Redirigervers la page de la partie
        return redirect()->route('games.show',  $game);
    }


   

}

