<?php 

namespace App\Http\Classes;

use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class Requisitor {
    public static function requisitarLogin(array $request) {
        $url = 'https://ah.we.imply.com/caua/login';
        $ch  = curl_init($url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
    
        $resultado = curl_exec($ch);
        curl_close($ch);
        return json_decode($resultado);
    }

    public static function requisitarProdutos(array $request) {
        $url = 'https://ah.we.imply.com/caua/produtos';
        $ch  = curl_init($url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
    
        $resultado = curl_exec($ch);
        curl_close($ch);
        return json_decode($resultado);
    }
}