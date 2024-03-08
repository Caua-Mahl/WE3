<?php 

namespace App\Http\Controllers;

use App\Http\Classes\Requisitor;
use Illuminate\Http\Request;

class LojaController extends Controller {
    public function index(Request $request) {
        $modalidade = ['modalidade' => '1'];
        if ($request->session()->has('modalidade')) 
            $modalidade = ['modalidade' => $request->session()->get('modalidade')];

        $produtos = Requisitor::requisitarProdutos($modalidade);
        return view('loja')->with('produtos', $produtos->result);

    }
}