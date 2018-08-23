<!-- gerenciamento/produtos/historicos -->
<h2>Histórico do produto: <?php echo $produto['p_name']; ?></h2>

<?php echo form_open(null,array('id'=> 'pesquisar_historico', 'autocomplete' => 'off')); ?>
	<div class="line">
		<label class="p33">
			<span class="label">Data de</span>
			<input type="text" id="from" name="date_from" class="calendario"  value="<?php echo set_value('date_from'); ?>" />
		</label>
		<label class="p33" >
			<span class="label">Até</span>
			<input type="text" id="to" name="date_to" class="calendario" value="<?php echo set_value('date_to'); ?>" />
		</label>
	</div>
<?php echo form_close();?>

<div class="great_buttons">
	<div class="p33"><a href="#entradas" class="active" rel=".table">Entradas</a></div>
	<div class="p33"><a href="#saidas" rel=".table">Saídas</a></div>
	<div class="p33"><a href="#vendas" rel=".table">Vendas</a></div>
</div>

<table class="table" id="entradas">
	<thead>
		<tr>
			<th>Quantidade</th>
			<th>Data</th>
			<th>Usuário</th>
			<th></th>
		</tr>	
	</thead>	
	<tbody>
		<?php foreach($entradas as $list):?>

			<tr>
				<td><?php echo $list['pi_amount'];?></td>
				<td><?php echo date('d/m/Y', strtotime($list['pi_registry_date'])).' ás '.
				date('H:m:s', strtotime($list['pi_registry_date'])); ?></td>
				<td><?php echo $list['u_name'];?></td>
				<td><?php echo a_delete("gerenciamento/produtos/del_entrada/".$list['pi_id'],'',
								   		array('class'=>'excluir_ajax','rel'=>'excluir a quantidade '.$list['pi_amount'],'title'=>'Excluir Entrada'));?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>	
</table>

<table class="table" id="saidas" style="display: none">
	<thead>
		<tr>
			<th>Quantidade</th>
			<th>Data</th>
			<th>Usuário</th>
		</tr>	
	</thead>	
	<tbody>
		<?php foreach($saidas as $list):?>

			<tr>
				<td><?php echo $list['pl_amount'];?></td>
				<td><?php echo date('d/m/Y', strtotime($list['pl_registry_date'])).' ás '. 
				date('H:m:s', strtotime($list['pl_registry_date']));?></td>
				<td><?php echo $list['u_name'];?></td>
				<td><?php echo a_delete("gerenciamento/produtos/del_saida/".$list['pl_id'],'',
								   		array('class'=>'excluir_ajax','rel'=>'excluir a quantidade '.$list['pl_amount'],'title'=>'Excluir Saida'));?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>	
</table>