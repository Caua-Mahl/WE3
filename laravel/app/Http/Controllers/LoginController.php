<?php 

namespace App\Http\Controllers;

use App\Http\Classes\Requisitor;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function index() {
        return view('login');
    }

    public function logar(Request $dados) {
        $dados->validate([
            'email' => 'required|email',
            'cpf'   => 'required|size:11|regex:/[0-9]{11}/'
        ], 
        [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email'    => 'O campo e-mail deve ser um e-mail válido',
            'cpf.required'   => 'O campo cpf é obrigatório',
            'cpf.size'       => 'O campo cpf deve ter 11 dígitos',
            'cpf.regex'      => 'O campo cpf deve ter apenas números'
        ]);
        $resultado = Requisitor::requisitarLogin($dados->only(['email', 'cpf']));
        if ($resultado->result->logado) {
            return "receba";
            return redirect()->route('loja.index');
        }
        return "devolva";
        return redirect()->route('login.index');
    }

    public function deslogar() {
        return redirect()->route('login.index');
    }
}