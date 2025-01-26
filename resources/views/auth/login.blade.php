@extends('layouts.master')

@section('title', 'Connexion')

@section('content')

<div class="row justify-content-center mt-5">

    <div class="col-md-6">
        <div class="card">

            <div class="card-header">
                <h4 class="text-center">Connexion</h4>
            </div>
            <div class="card-body">
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 row ">
                      
                        <label for="pseudo" class="col-sm-4 col-form-label">Pseudo</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                        </div>
                        
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-4 col-form-label">Mot de pass</label>
                        <div class="col-sm-7">
                        <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit"  class="btn btn-primary btn-sm">Se connecter</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">

                <p>Pas encore inscrit ? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>
            </div>
        </div>
    </div>
</div>

@endsection