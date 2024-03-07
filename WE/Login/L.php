<?php

function WebServiceExec($params, $data) {
    $banco = Db::Read()
        ->clear()
        ->select(["bp.nome"])
        ->from('base_pessoa bp')
        ->whereAND([
            "bp.email" => $data['email'],
            "bp.cpf"   => $data['cpf']
        ])
        ->fetch();

    if (is_null($banco["nome"])) {
        return ["logado" => False];
    }

    $banco["logado"] = True;
    return $banco;
}

