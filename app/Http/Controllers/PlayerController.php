<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
         // Afficher la page personnelle du joueur
    public function show(Request $request)
    {
        // Récupérer le joueur connecté

        $player = $request->user();

        // Passer le joueur à la vue

        return view('player.profile', ['player' => $player]);
    }
}
