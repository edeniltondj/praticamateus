<!-- paginas/index -->
<?php

if(isset($inativos)) :

	?>
<p class="title1">Cadastros pendentes de aprovação</p>
<?php 
if (isset($messages_habilita)) {
	echo message_lot($messages_habilita);
}
?>

<table class="table alert">
	<thead>
		<tr>
			<th>Cadastrante</th>
			<!--th>ID</th-->
			<th>Nome</th>
			<th>CPF/CNPJ</th>
			<!--th>Email1</th>
			<th>Tel. Fixo</th>
			<th>Tel1</th>
			<th>Login</th-->
			<th>Cidade</th>
			<th>Cargo</th>
			<th>Remuneração</th>
			<th>Status</th>
			<th>Admissão</th>
			<th style="width: 10%"></th>

		</tr>	
	</thead>	
	<tbody>
		<?php foreach($inativos as $list):
				if($list['status'] != 1) :
					echo '<tr class="off">';
				else :
					echo '<tr>';
				endif;
			?>						
				<td><?php echo $list['nome_cadastrante'].' ('.$list['id_cadastrante'].')';?></td>
				<!--td><?php echo $list['id'];?></td-->
				<td><?php echo $list['nome'];?></td>
				<td><?php echo $list['cpf'].(($list['cpf'] != null && $list['cnpj'] != null) ? (' / ') : '').$list['cnpj'];?></td>
				<!--td><?php echo $list['email1'];?></td>
				<td><?php echo $list['tel_fixo'];?></td>
				<td><?php echo $list['tel1'];?></td>
				<td><?php echo $list['login'];?></td!-->
				<td><?php echo $list['cidade_nome']; ?></td>
				<td><?php echo $list['tipo_nome']; ?></td>
				<td><?php echo number_format($list['remuneracao'], 2,',', '.'); ?></td>
				<td><?php echo $list['status']?'Ativo':'Inativo'; ?></td>
				<td><?php echo date('d/m/Y', strtotime($list['data_admissao']));?></td>
				<td>					
					<a onclick="$('#work_area').load('<?php echo base_url('usuarios/aprovar/'.$list['id']); ?>');" class="button agree small" rel="Aprovar Usuário" title="Aprovar Usuário"><span></span></a>
					<a onclick="$('#work_area').load('<?php echo base_url('usuarios/desaprovar/'.$list['id']); ?>');" class="button desagree small" rel="Desaprovar Usuário" title="Desaprovar Usuário"><span></span></a>
					<a onclick="$('#work_area').load('<?php echo base_url('usuarios/visualizar/'.$list['id']); ?>');" class="button view small" rel="Visualizar Cadastro" title="Visualizar Cadastro"><span></span></a>
				</td>
			</tr>
			<!--?php } ?-->
		<?php endforeach;?>
	</tbody>	
</table>
<?php
endif;//paginas

if(!empty($usuarios[0]['id'])) :

	?>
</br><p class="title1">Usuários cadastrados</p>
<?php echo (isset($messages)) ? message_lot($messages) : null; ?>
<table class="table paginate">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>CPF/CNPJ</th>
			<!--th>Email1</th>
			<th>Tel. Fixo</th>
			<th>Tel1</th>
			<th>Login</th-->
			<th>Cidade</th>
			<th>Cargo</th>
			<th>Remuneração</th>
			<th>Status</th>
			<th>Admissão</th>
			<th style="width: 10%"></th>

		</tr>	
	</thead>	
	<tbody>
		<?php foreach($usuarios as $list):?>
			<!--?php if($list['login'] != $session->user_login) { ?-->
			<tr>
				<td><?php echo $list['id'];?></td>
				<td><?php echo $list['nome'];?></td>
				<td><?php echo $list['cpf'].(($list['cpf'] != null && $list['cnpj'] != null) ? (' / ') : '').$list['cnpj'];?></td>
				<!--td><?php echo $list['email1'];?></td>
				<td><?php echo $list['tel_fixo'];?></td>
				<td><?php echo $list['tel1'];?></td>
				<td><?php echo $list['login'];?></td-->
				<td><?php echo $list['cidade_nome']; ?></td>
				<td><?php echo $list['tipo_nome']; ?></td>
				<td><?php echo  number_format($list['remuneracao'], 2,',', '.'); ?></td>
				<td><?php echo $list['status']?'Ativo':'Inativo'; ?></td>
				<td><?php echo date('d/m/Y', strtotime($list['data_admissao']));?></td>
				<td><a onclick="$('#work_area').load('<?php echo base_url('usuarios/editar/'.$list['id']); ?>');" class="button edit small" rel="Editar Usuário" title="Editar Usuário"><span></span></a>
					<?php 
					if($list['status']) { ?>
					<a onclick="$('#work_area').load('<?php echo base_url('usuarios/desativar/'.$list['id']); ?>');" class="button lock small" rel="Bloquear Usuário" title="Bloquear Usuário"><span></span></a>
					<?php } else { ?> 
					<a onclick="$('#work_area').load('<?php echo base_url('usuarios/ativar/'.$list['id']); ?>');"  class="button unlock small" rel="Desbloquear Usuário" title="Desbloquear Usuário"><span></span></a>
					<?php } ?>
				</td>
			</tr>
			<!--?php } ?-->
		<?php endforeach;?>
	</tbody>	
</table></br>
<?php
endif;//paginas
//echo a_add('usuarios/adicionar', '<i></i><span>Cadastrar novo</span>');
?>
</br><a class="button add " onclick="$('#work_area').load('<?php echo base_url('usuarios/adicionar'); ?>');"><i></i><span>cadastrar novo</span></a>
<script type="text/javascript">
$(function(){
	$('table.paginate').dataTable();
});
</script>