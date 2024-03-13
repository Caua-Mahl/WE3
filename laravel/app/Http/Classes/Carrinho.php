<?php

namespace App\Http\Classes;

use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class Carrinho {

    public static function Total($carrinho): int {
        $total = 0;

        foreach ($carrinho as $produto) {
            $total += $produto->preco * $produto->quantidade;
        }

        return $total;
    }

    public static function Adicionar ($carrinho, array $produto) : array {

        is_object($carrinho) ? $carrinho = (array) $carrinho : null;

        if (count($carrinho) > 0 && array_search($produto['id'], array_column($carrinho, 'id')) !== false) {

            $carrinho[array_search($produto['id'], array_column($carrinho, 'id'))]->quantidade += $produto['quantidade'];
            return $carrinho;
        }
        
        array_push($carrinho, $produto);
        return $carrinho;
    }

    public static function Remover ($carrinho, array $produto) : array {

        is_object($carrinho) ? $carrinho = (array) $carrinho : null;

        unset($carrinho[array_search($produto['id'], array_column($carrinho, 'id'))]);
        
        return array_values($carrinho);
    }

    public static function Atualizar ($carrinho, array $produto) : array {

        is_object($carrinho) ? $carrinho = (array) $carrinho : null;

        $carrinho[array_search($produto['id'], array_column($carrinho, 'id'))]->quantidade = $produto['quantidade'];
        
        return $carrinho;
    }
}



// perguntar qual jeito é melhor amanhã
/*
    $carrinho[array_search($produto['id'], array_column($carrinho, 'id'))]->quantidade = $produto['quantidade'];


    $ids   = array_column($carrinho, 'id');
    $index = array_search($produto['id'], $ids);

    $carrinho[$index]->quantidade = $produto['quantidade'];
    
    return $carrinho;
}

*/