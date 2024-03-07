<?php 
function WebServiceExec($params, $data){
	$json = Db::Read()->clear()
		->select([
			'p.dscproduto',
			'p.preco',
			'p.idproduto'
		])
		->from ('pdv_produto p')
        ->whereAND([
			'p.preco' => new we_Where_NotEqual(0),
			'p.modalidade' => $data['modalidade'],
			'p.ativo' => true		   
		])
		->limitDB(4)
	    ->fetchAll();

    return $json;
}
	
	