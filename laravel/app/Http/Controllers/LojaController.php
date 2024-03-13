<?php

namespace App\Http\Controllers;

use App\Http\Classes\Requisitor;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function index()
    {
        if (!session('usuario'))
            return redirect()->route('login.index')->withErrors(['email' => 'Você precisa estar logado para acessar a loja']);

        $produtos  = Requisitor::requisitarApi('https://ah.we.imply.com/caua/produtos');
        $descrição = "Este lugar é muito bonito, tem uma paisagem incrível e é muito bom para relaxar.";
        $paises    = [
            "Japão",
            "China",
            "India",
            "Estados Unidos",
            "Brasil",
            "Inglaterra",
            "França",
        ];

        for ($i = 0; $i < count($produtos->result); $i++) {
            $produtos->result[$i]->dscinterna = $descrição;
            $produtos->result[$i]->dscproduto = $paises[$i];  
            $produtos->result[$i]->imagem      = "paisagem.jpeg";
        }

        for ($i = 0; $i < 3; $i++) {
            $produtos->result[$i]->modalidade = 2;
        }



        session(['produtos' => $produtos->result]);

        return view('loja');
    }
}
