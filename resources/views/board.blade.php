<!DOCTYPE html>
<html>
<head>
    <title>Partie {{ $game->id }}</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Partie N°{{ $game->id }}</h1>

        <!-- Informations sur les joueurs -->
        <div class="mb-6 justify-center">
            <p>Joueur 1: {{ $game->player1->pseudo }}</p>
            <p>Joueur 2: {{ $game->player2 ? $game->player2->pseudo : 'En attente...' }}</p>
        </div>

        <!--plateau de jeu-->
        <div class="grid grid-cols-3 gap-2 w-64 mx-auto">
            @for ($i = 0; $i < 9; $i++)
                @php
                    // Vérifier si $game->actions existe avant d'appeler firstWhere()
                    $action= $game->actions ? $game->actions->firstWhere('position', $i) : null;
                    
                @endphp
                <div class="w-20 h-20 border border-gray-300 flex items-center justify-center">
                    @if ($action)
                        {{ $action->player->pseudo === $game->player1->pseudo ? 'X' : 'O' }}
                    @else
                        <form method="POST" action="{{ route('games.action', ['game' => $game->id]) }}">
                            @csrf
                            <input type="hidden" name="position" value="{{ $i }}">
                            <button type="submit" class="w-full h-full">
                                <!-- Case vide -->
                            </button>
                        </form>
                    @endif
                </div>
            @endfor
        </div>

        <!-- Statut de la partie -->
        <div class="mt-6">
            @if ($game->status === 'finished')
                <p class="text-xl font-semibold">
                    @if ($game->winner_id)
                        {{ $game->winner->pseudo }} a gagné !
                    @else
                        Match nul !
                    @endif
                </p>
            @else
                <p class="text-xl font-semibold">Partie en cours...</p>
            @endif
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>