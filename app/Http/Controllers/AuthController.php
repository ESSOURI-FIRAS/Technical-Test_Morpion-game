<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Player;

class AuthController extends Controller
{
    
    // fonction qui sert à afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    //fonction qui sert à afficher le formulaire d'identification
    public function showLoginForm()
    {
        return view('auth.login');
    }



    // Implémentation de  la logique d'enregistrement d'un joueur

    public function register(Request $request)
    {
        $fields=$request->validate([
            'pseudo' => 'required|unique:players',
            'password' => 'required',
        ]);

        $player = Player::create($fields);

        Auth::login($player);

        return redirect('/');
    }


    // Implémentation de la logique  d'identification d'un joueur

    public function login(Request $request)
    {
        $fields = $request->validate([
            'pseudo' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($fields)) {
            return redirect('/');
        }

        return back()->withErrors(['pseudo' => 'Invalid credentials']);
    }



    // implémentation de la logique de déconnexion d'un joueur
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }


}
