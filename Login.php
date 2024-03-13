<?php
function WebServiceExec($params, $data) {
    $banco = Db::Read()
        ->clear()
        ->select([
			"bp.nome",
			"bp.idpessoa",
		])
        ->from('base_pessoa bp')
        ->whereAND([
            "bp.email" => $data['email'],
            "bp.cpf"   => $data['cpf']
        ])
        ->fetch();

    if (is_null($banco["idpessoa"])) {
        return ["logado" => False];
    }

    $banco["logado"] = True;
    return $banco;
}
