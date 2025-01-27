@extends('layouts.authMaster')

@section('title', 'Lobby')

@section('content')


<div class="container">

    <nav class="navbar navbar-expand-lg   custom-navbar">

        <div class="container-fluid">
          
                 <h2 class="text-2xl font-semibold mb-6 text-center">Bienvenue dans Tic-Tac-Toe</h2>
          
          
                <div class="d-flex align-items-center">
                  
                    <label for="exampleLabel" class="text-light me-3">
                        <span class="text-dark">{{ $player->pseudo }}(<span style="color:#32b94f">connecté</span>)</span>
                    </label>

                    <form method="POST" action="{{ route('lobby.create-game') }}">
                        @csrf
                        <button type="submit"  class="btn btn-primary btn-sm m-4">
                            Lancer une partie
                        </button>
                    </form>

                  
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"  class="btn btn-primary btn-sm">
                            Déconnexion
                        </button>
                    </form>
                </div>
        </div>
    </nav>

    
    <br><br>
    <h4 class="text-xl font-semibold mb-4">Parties disponibles :</h4>
    <table>
    <thead>
        <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Player 1</th>
            <th class="py-2 px-4 border-b">Player 2</th>
        </tr>
    </thead>
    @if($games->count() > 0)
            <p class="font-italic" style="color:#ff3030">Aucune partie en attente !</p>
         @else
            <tbody>
                
                    @foreach ($games as $game)

                    <tr>
                        <td class="py-2 px-4 border-b">{{ $game->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $game->player1 ? $game->player1->pseudo : 'Joueur inconnu' }}</td>
                        
                            @if ($game->player1_id === Auth::id())
                            <td class="py-2 px-4 border-b">wait ...</td>
                                <td class="py-2 px-4 border-b">
                                <form method="POST" action="{{ route('games.destroy', $game->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Suppr
                                    </button>
                                </form></>
                        @else
                        <td class="py-2 px-4 border-b">
                            <form method="POST" action="{{ route('lobby.join-game', ['game' => $game->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm"> join</button>
                            </form>    
                        </td>
                        <td class="py-2 px-4 border-b"></td>       
                        @endif
                        
                    </tr>
                    
                    @endforeach
                @endif
            </tbody>
    </table>
</div>
@endsection

