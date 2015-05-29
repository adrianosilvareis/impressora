<?php 

 require_once 'CRUD.php';
 
 class Contador extends CRUD{
 
 	public $table = "contadores";
 	private $contador;
 	private $impressora;

 	public function setContador($contador){
 		$this->contador = $contador;
 	}
 	
 	public function getContador(){
 		return $this->contador;
 	}

 	public function setImpressora($impressora){
 		$this->impressora = $impressora;
 	}
 	
 	public function getImpressora(){
 		return $this->impressora;
 	}

 	public function insert(){
 		$sql = "INSERT INTO $this->table (contador, data, impressora_id) values (:contador, now(), :impressora)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':contador', $this->contador);
		$stmt->bindParam(':impressora', $this->impressora);
		return $stmt->execute();
 	}
 
 	public function update($id){
 		$sql = "UPDATE $this->table set contador=:contador, impressora=:impressora WHERE id=:id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':contador', $this->contador);
		$stmt->bindParam(':impressora', $this->impressora);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
 	}		
 }