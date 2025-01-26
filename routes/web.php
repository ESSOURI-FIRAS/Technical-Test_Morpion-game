<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;

/*
Route::get('/', function () {
    return view('welcome');
});*/


// rediriger la route racine vers /register
Route::redirect('/', '/login');

// Page personnelle du joueur 
Route::get('/player', [PlayerController::class, 'show'])->middleware('auth')->name('player.profile');


Route::middleware('auth')->group(function () {

    Route::get('/lobby', [LobbyController::class, 'index'])->name('lobby');
    Route::post('/lobby/create-game', [LobbyController::class, 'createGame'])->name('lobby.create-game');
    Route::post('/lobby/join-game/{id}', [LobbyController::class, 'joinGame'])->name('lobby.join-game');
    
    // Route pour rejoindre une partie
    Route::post('/games/{game}/join', [GameController::class, 'join'])->name('games.join');
    Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');

    // Routes pour les parties
    //Route::resource('games', GameController::class)->only(['show']);
    Route::post('/games/{game}/action', [GameController::class, 'makeAction'])->name('games.action');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.destroy');


   /* Route::get('/games', [GameController::class, 'index'])->name('games.index');
   // Route::post('/games', [GameController::class, 'store'])->name('games.store');
   // Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
   // Route::post('/games/{id}/join', [GameController::class, 'join'])->name('games.join');
   // Route::post('/games/{id}/move', [GameController::class, 'makeMove'])->name('games.move');
   */

    
    

});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
