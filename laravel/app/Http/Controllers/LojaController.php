<?php 

namespace App\Http\Controllers;

use App\Http\Classes\Requisitor;
use Illuminate\Http\Request;

class LojaController extends Controller {
    public function index(Request $request) {
        if (!session('usuario'))
            return redirect()->route('login.index')->withErrors(['email' => 'Você precisa estar logado para acessar a loja']);

        $modalidade = ['modalidade' => '1'];
        
        if ($request->session()->has('modalidade')) 
            $modalidade = ['modalidade' => $request->session()->get('modalidade')];

        $produtos = Requisitor::requisitarProdutos($modalidade);
        return view('loja')->with('produtos', $produtos->result);

    }
}