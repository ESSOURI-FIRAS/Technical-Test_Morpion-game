@extends('layouts.master')

@section('title', 'Lobby')

@section('content')



<div class="min-h-screen flex items-center justify-center ">

    
    <nav class="navbar navbar-expand-lg  bg-dark navbar-dark">
        <div class="container-fluid">
          <!-- Titre à gauche -->
          <h2 class="text-2xl text-white mb-6 text-center">Bienvenue dans Tic-Tac-Toe</h2>
          
          <!-- Contenu à droite -->
          <div class="d-flex align-items-center">
            
            <label for="exampleLabel" class="text-light me-3">
                <span class="font-semibold">{{ $player->pseudo }}(connecté)</span>
            </label>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"  class="btn btn-primary btn-sm">
                    Déconnexion
                </button>
            </form>
          </div>
        </div>
      </nav>
    
        <!-- pour commencer une nouvelle partie -->
        <div class="mt-6">
            <a href="#">
                Lancer nouvelle partie
            </a>
        </div>

       
  
</div>
@endsection