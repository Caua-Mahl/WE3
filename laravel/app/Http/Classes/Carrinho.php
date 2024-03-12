<?php

namespace App\Http\Classes;

use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class Carrinho
{
    public static function Total(array $carrinho)
    {
        $total = 0;

        foreach ($carrinho as $produto) {
            $total += $produto->preco * $produto->quantidade;
        }

        return $total;
    }
}
