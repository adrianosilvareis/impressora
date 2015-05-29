<?php
	
	require_once ('class/contador.php');
	require_once ('class/Impressora.php');

	$Contador =  new Contador;
	$Impressora = new Impressora;
	
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$Contador->setImpressora($request->imp);
	$Contador->setContador($request->cont);
	$Contador->insert();
	$Impressora->update($request->imp);
	echo "success.";
 ?>