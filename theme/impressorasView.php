<div class="corpo">
	<div class="titulo">
		<h2>Impressoras</h2>
		<h4>
			<?php echo utf8_encode($Posto->find($_GET['unid'])->nome) ?>
		</h4>
	</div>
	<div class="voltar">
		<a class="btn btn-default btn-primary" href="JavaScript: window.history.back();">Voltar</a>
	</div>
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>Posto</th>
			<th>Numero da Unidade</th>
		</tr>
		<?php foreach ($Impressora->findAll() as $key => $value): ?>
		<?php if ($value->ativo): ?>
			<tr>
				<td><a href="<?php echo 'index.php?unid='.$value->id ?>"><?php echo utf8_encode($value->nome) ?></a></td>
				<td><?php echo utf8_encode($value->numero) ?></td>
			</tr>
		<?php endif ?>
		<?php endforeach ?>
	</table>
</div>