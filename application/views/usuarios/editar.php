<?php echo form_open_multipart(current_url(), array('id'=> 'usuarios_add', 'autocomplete' => 'off')); ?>
<section class="boxform" style="float: left;">
	<header>Dados Principais</header>
	<label>
		<span>Nome</span>
		<input type="text" name="nome" maxlength="90" value="<?php echo (set_value('nome')) ? set_value('nome') : $usuario['nome']; ?>" required/>
		<?php echo form_error('nome'); ?>
	</label>
	<label>
		<span>RG</span>
		<input type="text" name="rg" style="" value="<?php echo (set_value('rg')) ? set_value('rg') : $usuario['rg']; ?>" />
		<?php echo form_error('rg'); ?>
	</label>
	<label>
		<span>Orgão/Data Exp.</span>
		<input type="text" name="rg_orgao" style="width: 32%; min-width: 53px; margin-right: 2%;" value="<?php echo (set_value('rg_orgao')) ? set_value('rg_orgao') : $usuario['rg_orgao']; ?>" />
		<?php echo form_error('rg_orgao'); ?>
		<input type="text" name="rg_expedicao" style="width: 32%; min-width: 75px;" class="dataa" maxlength="10" value="<?php echo date('d/m/Y', strtotime((set_value('rg_expedicao')) ? set_value('rg_expedicao') : $usuario['rg_expedicao'])); ?>" />
		<?php echo form_error('rg_expedicao'); ?>
	</label>
	<label>
		<span>CPF</span>
		<input type="text" name="cpf" style="" value="<?php echo (set_value('cpf')) ? set_value('cpf') : $usuario['cpf']; ?>" />
		<?php echo form_error('cpf'); ?>
	</label>
	<label>
		<span>CNPJ</span>
		<input type="text" name="cnpj" style="" value="<?php echo (set_value('cnpj')) ? set_value('cnpj') : $usuario['cnpj']; ?>" />
		<?php echo form_error('cnpj'); ?>
	</label>
	<label>
		<span>Nascimento</span>
		<input type="text" class="dataa" name="nascimento" maxlength="10" value="<?php echo date('d/m/Y', strtotime((set_value('nascimento')) ? set_value('nascimento') : $usuario['nascimento'])); ?>"/>
		<?php echo form_error('nascimento'); ?>
	</label>
	<label>
		<span>Naturalidade</span>
		<input type="text" name="naturalidade" maxlength="20" value="<?php echo (set_value('naturalidade')) ? set_value('naturalidade') : $usuario['naturalidade']; ?>"/>
		<?php echo form_error('naturalidade'); ?>
	</label>
	<label>
		<span>Nacionalidade</span>
		<input type="text" name="nacionalidade" maxlength="20" value="<?php echo (set_value('nacionalidade')) ? set_value('nacionalidade') : $usuario['nacionalidade']; ?>" required/>
		<?php echo form_error('nacionalidade'); ?>
	</label>
	<label>
		<span>Escolaridade</span>
		<select name="escolaridade">
			<option value="">Selecione</option>
			<?php foreach($escolaridades as $option): ?>
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('escolaridade') == $option['id'] || $usuario['escolaridade'] == $option['id']) ? 'selected="true"' : ''; ?>><?php echo $option['titulo']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('escolaridade'); ?>
	</label>
	<label>
		<span>Estado Civil</span>
		<select name="estado_civil">
			<option value="">Selecione</option>
			<option value="1" <?php echo (set_value('estado_civil') == 1 || $usuario['estado_civil'] == 1) ? 'selected="true"' : ''; ?>>Solteiro(a)</option>
			<option value="2" <?php echo (set_value('estado_civil') == 2 || $usuario['estado_civil'] == 2) ? 'selected="true"' : ''; ?>>Casado(a)</option>
			<option value="3" <?php echo (set_value('estado_civil') == 3 || $usuario['estado_civil'] == 3) ? 'selected="true"' : ''; ?>>Divorciado(a)</option>
			<option value="4" <?php echo (set_value('estado_civil') == 4 || $usuario['estado_civil'] == 4) ? 'selected="true"' : ''; ?>>Viúvo(a)</option>
		</select>
		<?php echo form_error('estado_civil'); ?>
	</label>
	<label>
		<span>Nome Cônjuge</span>
		<input type="text" name="nome_conjuge" maxlength="90" value="<?php echo (set_value('nome_conjuge')) ? set_value('nome_conjuge') : $usuario['nome_conjuge']; ?>" />
		<?php echo form_error('nome_conjuge'); ?>
	</label>
	<label>
		<span>Pai</span>
		<input type="text" name="pai" maxlength="90" value="<?php echo (set_value('pai')) ? set_value('pai') : $usuario['pai']; ?>"/>
		<?php echo form_error('pai'); ?>
	</label>
	<label>
		<span>Mãe</span>
		<input type="text" name="mae" maxlength="90" value="<?php echo (set_value('mae')) ? set_value('mae') : $usuario['mae']; ?>"/>
		<?php echo form_error('mae'); ?>
	</label>
	<label>
		<span>Quant. Filhos</span>
		<input type="number" min="0" step="1" name="filhos" maxlength="2" value="<?php echo (set_value('filhos')) ? set_value('filhos') : $usuario['filhos']; ?>"/>
		<?php echo form_error('filhos'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Endereço</header>
	<label>
		<span>Rua</span>
		<input type="text" name="end_rua" maxlength="20" value="<?php echo (set_value('end_rua')) ? set_value('end_rua') : $usuario['end_rua']; ?>" required/>
		<?php echo form_error('end_rua'); ?>
	</label>
	<label>
		<span>Número</span>
		<input type="text" name="end_numero" maxlength="9" value="<?php echo (set_value('end_numero')) ? set_value('end_numero') : $usuario['end_numero']; ?>" required/>
		<?php echo form_error('end_numero'); ?>
	</label>
	<label>
		<span>Complemento</span>
		<input type="text" name="end_complemento" maxlength="20" value="<?php echo (set_value('end_complemento')) ? set_value('end_complemento') : $usuario['end_complemento']; ?>" />
		<?php echo form_error('end_complemento'); ?>
	</label>
	<label>
		<span>Bairro</span>
		<input type="text" name="end_bairro" maxlength="20" value="<?php echo (set_value('end_bairro')) ? set_value('end_bairro') : $usuario['end_bairro']; ?>" required/>
		<?php echo form_error('end_bairro'); ?>
	</label>
	<label style="display: block; float: left; width: 100%; padding: 0px;">
		<span>UF - Cidade</span>
		<select name="end_uf" style="width: 15%; min-width: 53px; margin-right: 6px;" required>
			<option value="">UF</option>
			<?php foreach($ufs as $option): ?>
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('end_uf') == $option['id'] || $usuario['end_uf'] == $option['sigla']) ? 'selected="true"' : ''; ?>><?php echo $option['sigla']; ?></option>
			<?php endforeach; ?>
		</select>
		<select name="end_cidade" style="width: 50%; min-width: 136px;" required>
			<option>Cidade</option>
			<?php foreach($cidades as $option): ?>
				<option value="<?php echo $option['id_cidade']; ?>" <?php echo (set_value('end_cidade') == $option['id_cidade'] || $usuario['end_cidade'] == $option['id_cidade']) ? 'selected="true"' : ''; ?>><?php echo $option['nome_cidade']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('end_cidade'); ?>
	</label>
	<label>
		<span>CEP</span>
		<input type="text" name="end_cep" maxlength="10" value="<?php echo (set_value('end_cep')) ? set_value('end_cep') : $usuario['end_cep']; ?>" required/>
		<?php echo form_error('end_cep'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Contato</header>
	<label>
		<span>Tel. Fixo</span>
		<input type="text" class="tel" name="tel_fixo" maxlength="14" value="<?php echo (set_value('tel_fixo')) ? set_value('tel_fixo') : $usuario['tel_fixo']; ?>" required/>
		<?php echo form_error('tel_fixo'); ?>
	</label>
	<label>
		<span>Telefone 1</span>
		<input type="text" class="tel" name="tel1" maxlength="14" value="<?php echo (set_value('tel1')) ? set_value('tel1') : $usuario['tel1']; ?>" />
		<?php echo form_error('tel1'); ?>
	</label>
	<label>
		<span>Telefone 2</span>
		<input type="text" class="tel" name="tel2" maxlength="14" value="<?php echo (set_value('tel2')) ? set_value('tel2') : $usuario['tel2']; ?>" />
		<?php echo form_error('tel2'); ?>
	</label>
	<label>
		<span>Telefone 3</span>
		<input type="text" class="tel" name="tel3" maxlength="14" value="<?php echo (set_value('tel3')) ? set_value('tel3') : $usuario['tel3']; ?>" />
		<?php echo form_error('tel3'); ?>
	</label>
	<label>
		<span>E-mail 1</span>
		<input type="email" name="email1" maxlength="96" value="<?php echo (set_value('email1')) ? set_value('email1') : $usuario['email1']; ?>" required/>
		<?php echo form_error('email1'); ?>
	</label>
	<label>
		<span>E-mail 2</span>
		<input type="email" name="email2" maxlength="96" value="<?php echo (set_value('email2')) ? set_value('email2') : $usuario['email2']; ?>" />
		<?php echo form_error('email2'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Redes Sociais</header>
	<label>
		<span>Skype</span>
		<input type="text" name="skype" maxlength="90" value="<?php echo (set_value('skype')) ? set_value('skype') : $usuario['skype']; ?>" />
		<?php echo form_error('skype'); ?>
	</label>
	<label>
		<span>Facebook</span>
		<input type="email" name="facebook" maxlength="96" value="<?php echo (set_value('facebook')) ? set_value('facebook') : $usuario['facebook']; ?>" />
		<?php echo form_error('facebook'); ?>
	</label>
	<label>
		<span>WhatsApp</span>
		<input type="text" class="tel" name="whatsapp" maxlength="14" value="<?php echo (set_value('whatsapp')) ? set_value('whatsapp') : $usuario['whatsapp']; ?>" />
		<?php echo form_error('whatsapp'); ?>
	</label>
</section>
<section class="boxform" style="float: left;">
	<header>Contrato</header>
	<label>
		<span>Forma Contrato</span>
		<select name="tipo_contrato" style="min-width: 53px; margin-right: 6px;" required>
			<option value="">Selecione</option>
			<?php foreach($tipos_contrato as $option): ?>
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('tipo_contrato') == $option['id'] || $usuario['tipo_contrato'] == $option['id']) ? 'selected="true"' : ''; ?>><?php echo $option['nome']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('tipo_contrato'); ?>
	</label>
	<label>
		<span>Remuneração</span>
		<input type="text" name="remuneracao" placeholder="00,00" onkeypress="return(MascaraMoeda(this,'.',',',event))" value="<?php echo (set_value('remuneracao')) ? set_value('remuneracao') : number_format($usuario['remuneracao'], 2,',', '.'); ?>" required/>
		<?php echo form_error('remuneracao'); ?>
	</label>
	<?php if(false) { // Somente para não exibir esses campos :-)?>
	<label>
		<span>Cargo</span>
		<select name="tipo" required>
			<option value="">Selecione</option>
			<?php foreach($tipos_usuario as $option): ?>
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('tipo') == $option['id'] || $usuario['tipo'] == $option['id']) ? 'selected="true"' : ''; ?>><?php echo $option['titulo']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('tipo'); ?>
	</label>
	<label>
		<span>Supervisor</span>
		<select name="superior">
			<option value="">Selecione</option>
			<?php foreach($supervisores as $option): ?>
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('superior') == $option['id'] || $usuario['superior'] == $option['id']) ? 'selected="true"' : ''; ?>><?php echo $option['nome']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('superior'); ?>
	</label>
	<?php } ?>
	<label>
		<span>Data Admissão</span>
		<input type="text" class="dataa" name="data_admissao" maxlength="10" value="<?php echo date('d/m/Y', strtotime((set_value('data_admissao')) ? set_value('data_admissao') : $usuario['data_admissao'])); ?>" required/>
		<?php echo form_error('data_admissao'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Sistema</header>
	<label>
		<span>Login</span>
		<input type="text" name="login" maxlength="15" value="<?php echo (set_value('login')) ? set_value('login') : $usuario['login']; ?>" required/>
		<?php echo form_error('login'); ?>
	</label>
	<label>
		<span>Senha</span>
		<input type="password" name="nova_senha" maxlength="15"  value="<?php echo set_value('nova_senha'); ?>"/>
		<?php echo form_error('nova_senha'); ?>
	</label>
	<label>
		<span>Observações</span>
		<textarea name="obs" maxlength="245" style="height: 60px;"><?php echo (set_value('obs')) ? set_value('obs') : $usuario['obs']; ?></textarea>
		<?php echo form_error('obs'); ?>
	</label>
	<label>
		<span>Ativo?</span>
		<?php echo form_checkbox(array(
			'name'		=> 'status',
			'value'		=> 1,
			'checked'	=> (set_value('filhos') ? set_value('filhos') : $usuario['filhos']) )); ?>
			<?php echo form_error('status'); ?>
		</label>
	</section>
	<div class="buttons">
		<?php echo submit_add('add', 'Cadastrar', array('style'=>'float: left')); ?>
		<a class="button cancel " onclick="$('#work_area').load('<?php echo base_url('usuarios'); ?>');"><span>Cancelar</span> </a>
	</div>

	<?php echo form_close(); ?>

	<script>
		$( "#usuarios_add" ).submit(function( event ) {
			event.preventDefault();

			$.post( $( this ).attr( "action" ), $( this ).serialize())
			.done(function( data ) {
				$("#work_area").html(data );
			});
		});

	$('[name="end_uf"]').change(function() {
			$.ajax({
				url: "<?php echo base_url('cidades/getarray'); ?>",
				 data: {id_uf: $(this).val()},
				type: "POST",
				dataType: 'json'
			}).done(function( data ) {
				$('[name="end_cidade"]').html('');
				if($(data).length) {
					$('<option value="">Selecione a Cidade</option>').appendTo($('[name="end_cidade"]'));
					$.map(data, function(item,key) {
						$('<option value="' + item.id_cidade + '">' + item.nome_cidade+ '</option>').appendTo($('[name="end_cidade"]'));
					});
					$('[name="end_cidade"]').attr('disabled', false);
				} else {
					$('[name="end_cidade"]').attr('disabled', true);
					$('<option value="">Não existem cidades</option>').appendTo($('[name="end_cidade"]'));
				    
				}
			});	
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url('src/js/jquery.mask.min.js'); ?>"></script>
	<script>
		$('[class="dataa"]').mask("00/00/0000", {placeholder: "__/__/____"});
		$('[name="end_cep"]').mask("00.000-000", {placeholder: "__.__-____"});
		$('[class="tel"]').mask("(00)0000-00000", {placeholder: "(__)____-_____"});
		$('[name="cpf"]').mask("999.999.999-99");
		$('[name="cnpj"]').mask("99.999.999/9999-99");
	</script>