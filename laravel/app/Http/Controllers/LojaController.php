<?php

namespace App\Http\Controllers;

use App\Http\Classes\Requisitor;
use App\Models\User;
use App\Http\Classes\Carrinho;

class LojaController extends Controller {
    public function index() {
        try {
            if (!session('usuario'))
                return redirect()->route('login.index')->withErrors(['email' => 'Você precisa estar logado para acessar a loja']);

            $produtos  = Requisitor::requisitarApi('https://ah.we.imply.com/caua/produtos');
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
                $produtos->result[$i]->dscinterna = "Este lugar é muito bonito, tem uma paisagem incrível e é muito bom para relaxar.";
                $produtos->result[$i]->dscproduto = $paises[$i];  
                $produtos->result[$i]->imagem     = "paisagem.jpeg";
            }

            for ($i = 0; $i < 3; $i++) {
                $produtos->result[$i]->modalidade = 2;
            }

            session(['produtos' => $produtos->result]);

            return view('loja');
        }
        catch (\Exception $e) {
            return redirect()->route('login.index')->withErrors(['error' => 'Erro ao acessar loja']);
        }
    }

    public function adicionar() {
        try {
            $carrinho = json_decode(User::where('id', session('usuario')['id'])->first()->carrinho)->carrinho;
            $produto  = [
                'id'         => request('id'),
                'nome'       => request('nome'),
                'preco'      => request('preco'),
                'quantidade' => request('quantidade')
            ];
            
            User::where('id', session('usuario')['id'])
                ->update([
                    'carrinho' => json_encode(['carrinho' => Carrinho::Adicionar($carrinho, $produto)])
                ]);

            return redirect()->route('loja.index')->with('sucess', 'Produto adicionado ao carrinho');
        }
        catch (\Exception $e) {
            return redirect()->route('loja.index')->withErrors(['error' => 'Erro ao adicionar produto ao carrinho']);
        }
    }
}
