<!-- gerenciamento/sistema/index -->
<?php
echo a_config(ADMIN_PATH.'/mesas', 'Gerenciar <b>mesas</b>');
echo a_config(ADMIN_PATH.'/tokens', 'Gerenciar <b>tokens</b>');
?>
<br /><br /><br />
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Slogan</th>
				<th></th>
			</tr>	
		</thead>	
		<tbody>
			<?php foreach($configuracoes as $list):?>

				<tr>
					<td><?php echo $list['business_id'];?></td>
					<td><?php echo $list['business_name'];?></td>
					<td><?php echo $list['business_slogan']; ?></td>					
					<td><?php echo a_edit("gerenciamento/sistema/editar/".$list['business_id'],'',
						array('title'=>'Editar Configuração')); ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>	
	</table>


<?php echo (empty($configuracoes)) ? a_add(ADMIN_PATH.'/sistema/adicionar', 'Adicionar Configuração'): null; ?>
