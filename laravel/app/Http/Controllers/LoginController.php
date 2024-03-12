<?php

namespace App\Http\Controllers;

use App\Http\Classes\Requisitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use function Laravel\Prompts\error;

class LoginController extends Controller {
    public function index() {        
        return view('login');
    }

    public function logar(Request $dados) {
        $dados->validate(
            [
                'email'          => 'required|email',
                'cpf'            => 'required|size:11|regex:/[0-9]{11}/'
            ],
            [
                'email.required' => 'O campo e-mail é obrigatório',
                'email.email'    => 'O campo e-mail deve ser um e-mail válido',
                'cpf.required'   => 'O campo cpf é obrigatório',
                'cpf.size'       => 'O campo cpf deve ter 11 dígitos',
                'cpf.regex'      => 'O campo cpf deve ter apenas números'
            ]
        );

        $resultado = Requisitor::requisitarLogin($dados->only(['email', 'cpf']));

        if (is_null($resultado) or !($resultado->result->logado))
            return redirect()->route('login.index')->withErrors(['email' => 'E-mail ou cpf inválidos']);

        $usuario = User::firstOrCreate(
            [
                'email'    => $dados->email,
                'id'       => $resultado->result->idpessoa,
            ],
            [
                'name'     => $resultado->result->nome,
                'carrinho' => json_encode(['carrinho' => []]),
                'password' => $dados->cpf
            ]
        );

        Auth::Attempt([
            'email'    => $dados->email,
            'password' => $dados->cpf
        ]);

        if (!Auth::check())
            return redirect()->route('login.index')->withErrors(['email' => 'Erro ao logar']);

        session(['usuario' => $usuario]);

        return redirect()->route('loja.index');
    }

    public function deslogar() {
        session()->flush();
        return redirect()->route('login.index');
    }
}
