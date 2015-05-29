<div class="corpo">
	<div class="titulo">
		<h2>Impressoras</h2>
		<h4>
			<?php echo utf8_encode($Posto->find($_GET['unid'])->nome) ?>
			<?php if (isset($_GET['imp'])) {
				echo " / ".$Impressora->find($_GET['imp'])->serial;
			} ?>
		</h4>
	</div>
	<!-- verifica se tem uma impressora selecionada -->
	<?php if (!$_GET['imp']): ?>
	<!-- Faz reload da pagina uma vez para atualizar as impressoras que não foram cadastradas! -->
	<script type='text/javascript'>
		(function()
		{
		  if( window.localStorage )
		  {
		    if( !localStorage.getItem( 'firstLoad' ) )
		    {
		      localStorage[ 'firstLoad' ] = true;
		      window.location.reload();
		    }  
		    else
		      localStorage.removeItem( 'firstLoad' );
		  }
		})();
		</script>
		<div class="voltar">
			<a class="btn btn-default btn-primary" href="index.php">Voltar</a>
		</div>
	<?php else: ?> 
		<div class="voltar">
			<a class="btn btn-default btn-danger" href="index.php?unid=<?php echo $_GET['unid'] ?>">Sair</a>
		</div>
	<?php endif ?>
		<!-- Mostra formulario de registro para impressora selecionada! -->
	<?php if (isset($_GET['imp'])): ?>
		<div style="clear:both; float:left; margin-left:20px;">
			<hr>
			<form name="cadastro" class="form-inline" method="POST">
				<strong>Contador:</strong>
				<input class="form-control" type="text" name="cont" placeholder="Contador" 
				ng-model="contador" ng-pattern="/^\d{1,10}$/" ng-required="true">
				<input class="btn btn-success" type="button" value="Salvar" 
				ng-click="adicionarContador(<?php echo (int) $Impressora->maxCont($_GET['imp'])->contador ?>, <?php echo $_GET['imp'] ?>, <?php echo  $_GET['unid']?>)"
				ng-disabled="cadastro.$invalid">
			</form>
		</div>
		<alert-contadores title="Ops, Algo esta errado!" ng-if="cadastro.$error.pattern">
			Você esta digitando apenas numero ? seu numero tem mais de 10 digitos ?
		</alert-contadores>	
		<alert-contadores title="Ops, aconteceu um problema!" ng-if="mostraAlert()">
			O novo contador deve ser maior que {{oldContador}}
		</alert-contadores>
	<?php endif ?>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>Serial</th>
			<th>Descricao</th>
			<th>Modelo</th>
		</tr>
		<?php foreach ($Impressora->findToUnid($_GET['unid']) as $key => $value): ?>
		<?php if ($value->ativo): ?>
			<tr>
				<td><a href="<?php echo 'index.php?unid='.$value->uni_id.'&imp='.$value->imp_id ?>"><?php echo utf8_encode($value->serial) ?></a></td>
				<td><?php echo utf8_encode($value->descricao) ?></td>
				<td><?php echo utf8_encode($value->modelo) ?></td>
			</tr>
		<?php endif ?>
		<?php endforeach ?>
	</table>
</div>