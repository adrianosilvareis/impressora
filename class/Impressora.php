<?php 

require_once 'CRUD.php';

class Impressora extends CRUD{

	public $table = "impressora";

	public function insert(){
		//insert
	}

	public function update($id){
		//update
	} 		

	public function findRelacional(){
		$sql = "SELECT i.id, i.serial, i.status, i.descricao,
				p.nome as 'unidade', p.numero,p.ativo,
				m.descricao as 'modelo',
				t.descricao as 'tarifa', t.valor
				FROM impressora i
				JOIN postos p ON(i.fk_postos = p.id)
				JOIN modelo m ON(i.fk_modelo = m.id)
				JOIN taxa t   ON(i.fk_taxa = t.id)";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
}