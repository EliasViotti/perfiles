<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() {
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'usuario' => ['required'],
            'contrasenia' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales no coinciden.',
        ])->onlyInput('usuario');
    }
}
