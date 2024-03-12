<?php 

namespace App\Http\Classes;

class Requisitor {
    public static function requisitarApi(array $request, string $url) {
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