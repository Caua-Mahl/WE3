function WebServiceExec($params, $data){
	$json = Db::Read()->clear()
		->select([
			'p.dscproduto',
			'p.preco',
			'p.idproduto',
			'p.dscinterna',
			'p.imagem',
			'p.modalidade'
		])
		->from ('pdv_produto p')
        ->whereAND([
			'p.preco' => new we_Where_NotEqual(0),
			'p.ativo' => true		   
		])
		->limitDB(7)
	    ->fetchAll();

	for ($i = 0; $i < count($json); $i++) {
		$json[$i]['preco'] = number_format($json[$i]['preco'], 2);
	}

	return $json;
}
	
	