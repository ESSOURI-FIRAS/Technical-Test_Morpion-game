@extends('layouts.master')

@section('title', 'Lobby')

@section('content')



<div class="min-h-screen flex items-center justify-center ">

    <div class="row h-100 align-items-start ">
        <div class="col">
        <h2 class="text-2xl font-bold mb-6 text-center">Bienvenue dans Tic-Tac-Toe</h2>
        </div>

        <div class="col">
         <!-- Bouton pour se déconnecter -->
         <div class="mt-4 ml-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"  class="btn btn-primary btn-sm">
                    Déconnexion
                </button>
            </form>
        </div>
        </div>
        
</div>
    
        <h2 class="text-2xl font-bold mb-6 text-center">Bienvenue dans Tic-Tac-Toe</h2>

        <p class="text-center">Vous êtes connecté en tant que <span class="font-semibold">{{ $player->pseudo }}</span>.</p>

        <!-- Bouton pour commencer une nouvelle partie -->
        <div class="mt-6">
            <a href="#">
                Lancer nouvelle partie
            </a>
        </div>

       
  
</div>
@endsection