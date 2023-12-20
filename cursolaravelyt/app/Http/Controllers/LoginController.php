<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request) {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail não é válido.',
            'password.required' => 'O campo senha é obrigatório.',
            
        ]
    );

        if(Auth::attempt($credenciais, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard')); //O intended identifica se o usuário estava em alguma página antes de fazer o login e o leva de volta para essa página. 'dashboard' está atuando como valor padrão.
        } else {
            return redirect()->back()->with('erro', 'E-mail ou senha inválidos');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site.index')); //Se usarmos apenas o método redirect(), precisamos passar o path completo do redirecionamento. No entanto, para usarmos o name da rota, basta colocarmos dentro do método redirect() o método route().
    }

    public function create() {
        return view('login.create');
    }
}
