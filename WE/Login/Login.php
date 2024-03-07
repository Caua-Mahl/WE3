<?php

$banco = Db::Read()
->clear()
->select([
    "ccr.valor",
    "ccr.valor_desconto",
    "ccr.valor_juros",
    "ccr.valor_multa",
    "ccr.valor_adesao",
    "ccr.valor_desconto_manual",
    "ccr.dt_vencimento_origem",
    "ccr.valor_reajuste",
    'bp.cpf'
])
->from('gs_contrato gc')
->leftJoin('base_pessoa bp', 'bp.idpessoa = gc.idpessoa')
->leftJoin('cx_conta_receber ccr', 'ccr.idcontrato = gc.idcontrato')
->whereAND([
    "gc.num_contrato" => $data['contrato'],
    "ccr.status"      => "AP"
])
->orderByASC('ccr.dt_vencimento_origem')
->fetchall();