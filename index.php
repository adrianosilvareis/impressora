<?php 
	function __autoload($class_name){
		require_once 'class/'.$class_name.'.php';
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Contadores do Mês</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
</head>
<body>
	<?php 
		#declarações
		$Impressora = new Impressora; 
		$Posto = new Posto;
		$Modelo = new Modelo;	
		/*
		if(!isset($_GET['unid'])):
			require_once 'theme/unidadeView.php';
		elseif (!isset($_GET['imp'])):
			require_once 'theme/impressorasView.php';
		else:
			echo "contadores";
		endif;
		*/
	?>
	<div class="corpo">
		<h2>Unidades</h2>
		<table class="table table-striped">
			<tr>
				<th>Nome</th>
				<th>Codigo</th>
			</tr>
			<?php foreach ($Impressora->findRelacional() as $key => $value): ?>
				<tr>
					<td><?php echo $value->unidade ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

</body>
</html>