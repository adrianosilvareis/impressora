<div class="corpo">
	<h2>Unidades</h2>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Posto</th>
				<th>Numero da Unidade</th>
			</tr>
		</thead>
		<?php foreach ($Impressora->findUnid() as $key => $value): ?>
			<?php if ($value->ativo): ?>
				<tr>
					<td>
						<a href="<?php echo 'index.php?unid='.$value->id ?>">
							<?php echo utf8_encode($value->unidade) ?>
						</a>
					</td>
					<td>
						<?php echo utf8_encode($value->numero) ?>
					</td>
				</tr>
			<?php endif ?>	
		<?php endforeach ?>
	</table>
</div>