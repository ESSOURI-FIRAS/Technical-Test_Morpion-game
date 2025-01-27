@extends('layouts.master')
@vite('public\js\board.js')
@section('content')

<div class="container">
    <center><h1>Tic-Tac-Toe</h1></center>
    <div id="game-status" class="alert alert-info"> Start !</div>
    <div class="board" id="board">

    </div>
    <div class=" justify-between justify-items-stretch  ">
    <center><button id="restart-btn" class="btn btn-primary btn-sm justify-center">Recommencer</button></center>
    <form method="GET" action="{{ route('lobby') }}">
    <center><button id="quit-btn" class="btn btn-danger btn-sm justify-center">Quitter</button></center>
    </form>
    </div>
</div>

<div id="board" 
     data-game-id="{{ $game->id }}" 
     data-current-player="{{ Auth::id() }}">
</div>

<script src="{{ asset('js/board.js') }}"></script>
@endsection
