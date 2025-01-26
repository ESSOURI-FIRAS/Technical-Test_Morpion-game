@extends('layouts.master')

@section('title', 'Lobby')

@section('content')



<div class="min-h-screen flex items-center justify-center ">

    
    <nav class="navbar navbar-expand-lg  bg-dark navbar-dark">

        <div class="container-fluid">
          
                 <h2 class="text-2xl text-white mb-6 text-center">Bienvenue dans Tic-Tac-Toe</h2>
          
          
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

      
    <div class="mb-8">
      <h2 class="text-xl font-semibold mb-4">Parties en Attente</h2>
      <table class="min-w-full bg-white border border-gray-300">
          <thead>
              <tr>
                  <th class="py-2 px-4 border-b">ID</th>
                  <th class="py-2 px-4 border-b">Player 1</th>
                  <th class="py-2 px-4 border-b">Player 2</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($games as $game)
                  <tr>
                      <td class="py-2 px-4 border-b">{{ $game->id }}</td>
                      <td class="py-2 px-4 border-b">{{ $game->player1 ? $game->player1->pseudo : 'Joueur inconnu' }}</td>
                      <td class="py-2 px-4 border-b">
                        @if ($game->player1_id === Auth::id())
                        <span class="text-gray-500">waiting...</span>
                        @else
                        <form method="POST" action="{{ route('lobby.join-game', $game->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">
                                join
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    </div>



    
        <!-- Bouton pour créer une nouvelle partie -->
        <div>
          <form method="POST" action="{{ route('lobby.create-game') }}">
              @csrf
              <button type="submit" class="btn btn-primary btn-sm">
                  Créer une nouvelle partie
              </button>
          </form>
      </div>

      

       
  
</div>
@endsection