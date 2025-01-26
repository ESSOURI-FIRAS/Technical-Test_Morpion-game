<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LobbyController extends Controller
{
   // Afficher la vue  lobby
   public function index(Request $request)
   {
       // Récupérerle joueur connecté

       $player = $request->user();

       //  passer le joueur à la vue
       return view('lobby', ['player' => $player]);
   }
}


// {{ route('games.create') }} hethi nèottoha fel vue lobby mba3ed