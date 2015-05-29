<?php 
	function __autoload($class_name){
		require_once 'class/'.$class_name.'.php';
	}
?>
<!DOCTYPE html>
<html lang="pt-br" ng-app="impressoras">
<head>
	<title>Contadores do Mês</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<script src="lib/angular.js"></script>
	<script src="js/app.js"></script>
	<script src='js/controllers/contadorCtrl.js'></script>
	<script src="js/directives/alertContadores.js"></script>
</head>
<body ng-controller="impressoraCtrl">
	<?php 
		#declarações
		$Impressora = new Impressora; 
		$Posto = new Posto;
		$Modelo = new Modelo;	
		
		if(!isset($_GET['unid'])):
			require_once 'theme/unidadeView.php';
		else:
			require_once 'theme/impressorasView.php';
		endif;
		
	?>
</body>
</html>