<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\PlayerController;

/*
Route::get('/', function () {
    return view('welcome');
});*/


// rediriger la route racine vers /register
Route::redirect('/', '/register');

// Page personnelle du joueur 
Route::get('/player', [PlayerController::class, 'show'])->middleware('auth')->name('player.profile');


Route::middleware('auth')->group(function () {

    Route::get('/lobby', [LobbyController::class, 'index'])->name('lobby');

});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
