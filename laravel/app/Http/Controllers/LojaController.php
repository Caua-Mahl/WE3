<?php

namespace App\Http\Controllers;

use App\Http\Classes\Requisitor;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function index(Request $request)
    {
        if (!session('usuario'))
            return redirect()->route('login.index')->withErrors(['email' => 'Você precisa estar logado para acessar a loja']);

        $modalidade = ['modalidade' => '1'];

        if ($request->session()->has('modalidade'))
            $modalidade = ['modalidade' => $request->session()->get('modalidade')];

        $produtos  = Requisitor::requisitarApi($modalidade, 'https://ah.we.imply.com/caua/produtos');
        $descrição = "Este lugar é muito bonito, tem uma paisagem incrível e é muito bom para relaxar.";
        $paises    = [
            "Espanha",
            "Brasil",
            "Japão",
            "França"
        ];

        for ($i = 0; $i < count($produtos->result); $i++) {
            $produtos->result[$i]->dscinterna = $descrição;
            $produtos->result[$i]->dscproduto = "Passagens para " . $paises[$i];
        }

        session(['produtos' => $produtos->result]);

        return view('loja');
    }
}
