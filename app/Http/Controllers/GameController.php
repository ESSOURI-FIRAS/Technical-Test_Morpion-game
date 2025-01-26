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
        $game = Game::with('moves')->findOrFail($id);
        return view('games.show', compact('game'));
    }


    // créer une nouvellepartie
    public function store(Request $request)
    {
        $game = Game::create([
            'player1_id' => Auth::id(),
            'status' => 'waiting',
        ]);

        return redirect()->route('games.show', $game->id);
    }
}
