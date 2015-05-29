<?php 

require_once 'CRUD.php';

class Impressora extends CRUD{

	public $table = "impressora";

	public function insert(){
		//insert
	}

	public function update($id){
		$sql = "UPDATE $this->table set status = 1 WHERE id=:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
	} 		

	public function findUnid(){
		$sql = "SELECT p.id, i.serial, i.status, i.descricao,
				p.nome as 'unidade', p.numero,p.ativo,
				m.descricao as 'modelo',
				t.descricao as 'tarifa', t.valor
				FROM impressora i
				JOIN postos p ON(i.fk_postos = p.id)
				JOIN modelo m ON(i.fk_modelo = m.id)
				JOIN taxa t   ON(i.fk_taxa = t.id) 
				where i.status = 0
				group by p.nome order by p.nome";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function findToUnid($id){
		$sql = "SELECT i.id as 'imp_id', p.id as 'uni_id', i.serial, i.status, i.descricao,
				p.nome as 'unidade', p.numero,p.ativo,
				m.descricao as 'modelo',
				t.descricao as 'tarifa', t.valor
				FROM impressora i 
				JOIN postos p ON(i.fk_postos = p.id)
				JOIN modelo m ON(i.fk_modelo = m.id)
				JOIN taxa t   ON(i.fk_taxa = t.id) 
				WHERE p.id = :id and i.status = 0";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function maxCont($id){
		$sql = "SELECT * FROM contadores WHERE id = (SELECT MAX(id) FROM contadores WHERE impressora_id = :id)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}
}