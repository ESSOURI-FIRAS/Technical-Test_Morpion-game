<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Action;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    //afficher la liste des parties
    public function index()
    {
        $games = Game::where('status', 'waiting')->get();
        return view('games.index', compact('games'));
    }

    // afficher une partie
    public function show($id)
    {
        $game = Game::with('actions')->findOrFail($id);
        return view('board', compact('game'));
    }


    // créer une nouvellepartie
    public function store(Request $request)
    {
        $existingGame = Game::where('player1_id', Auth::id())
        ->orWhere('player2_id', Auth::id())
        ->whereIn('status', ['waiting', 'in_progress'])
        ->first();

        if ($existingGame) {
            return redirect()->route('lobby')->with('error', 'Vous avez déjà une partie en cours');
        }

        $game = Game::create([
            'player1_id' => Auth::id(),
            'status' => 'waiting',
        ]);

        return redirect()->route('games.show', $game);
    }

    


    // Enregistrer un mouvement
        public function makeAction(Request $request, Game $game)
        {
            $request->validate([
                'position' => 'required|integer|between:0,8',
            ]);

            // Vérifier si la partie est en cours
            if ($game->status !== 'in_progress') {
                return redirect()->back()->with('error', 'La partie n\'est pas en cours.');
            }

            // Vérifier si c'est le tour du joueur
            $lastAction = $game->actions()->latest()->first();
            if ($lastAction && $lastAction->player_id === Auth::id()) {
                return redirect()->back()->with('error', 'Ce n\'est pas votre tour.');
            }

            // Enregistrer le mouvement
            $action = $game->actions()->create([
                'player_id' => Auth::id(),
                'position' => $request->position,
            ]);

            // Vérifier si la partie est terminée
            $this->checkGameStatus($game);

            return redirect()->route('games.show', $game);
        }

        public function destroy(Game $game)
        {
                // vérifier si le joueur est autorisé à supprimer la partie
                if ($game->player1_id !== Auth::id() && $game->player2_id !== Auth::id()) {
                    return redirect()->route('lobby')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette partie.');
                }

                // Supprimer la partie
                $game->delete();

                return redirect()->route('lobby')->with('success', 'La partie a été supprimée.');
        }

    // Vérifier l'état de la partie
    protected function checkGameStatus(Game $game)
    { 
    }




}
