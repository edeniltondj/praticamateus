<?php echo form_open_multipart("usuarios/adicionar",array('id'=> 'usuarios_add', 'autocomplete' => 'off')); ?>
<p class="title1">Cadastro de usuário</p>
<section class="boxform" style="float: left;">
	<header>Dados Principais</header>
	<label>
		<span>Nome</span>
		<input type="text" name="nome" maxlength="90" value="<?php echo set_value('nome'); ?>" required/>
		<?php echo form_error('nome'); ?>
	</label>
	<label>
		<span>RG</span>
		<input type="text" name="rg" style="" value="<?php echo set_value('rg'); ?>" />
		<?php echo form_error('rg'); ?>
	</label>
	<label>
		<span>Orgão & Data Exp.</span>
		<input type="text" name="rg_orgao" style="width: 32%; min-width: 53px; margin-right: 2%;" value="<?php echo set_value('rg_orgao'); ?>" />
		<?php echo form_error('rg_orgao'); ?>
		<input type="text" name="rg_expedicao" style="width: 32%; min-width: 75px;" class="dataa" maxlength="10" value="<?php echo set_value('rg_expedicao'); ?>" />
		<?php echo form_error('rg_expedicao'); ?>
	</label>
	<label>
		<span>CPF</span>
		<input type="text" name="cpf" style="" value="<?php echo set_value('cpf'); ?>" />
		<?php echo form_error('cpf'); ?>
	</label>
	<label>
		<span>CNPJ</span>
		<input type="text" name="cnpj" style="" value="<?php echo set_value('cnpj'); ?>" />
		<?php echo form_error('cnpj'); ?>
	</label>
	<label>
		<span>Nascimento</span>
		<input type="text" class="dataa" name="nascimento" maxlength="10" value="<?php echo set_value('nascimento'); ?>"/>
		<?php echo form_error('nascimento'); ?>
	</label>
	<label>
		<span>Naturalidade</span>
		<input type="text" name="naturalidade" maxlength="20" value="<?php echo set_value('naturalidade'); ?>"/>
		<?php echo form_error('naturalidade'); ?>
	</label>
	<label>
		<span>Nacionalidade</span>
		<input type="text" name="nacionalidade" maxlength="20" value="<?php echo set_value('nacionalidade'); ?>" required/>
		<?php echo form_error('nacionalidade'); ?>
	</label>
	<label>
		<span>Escolaridade</span>
		<select name="escolaridade">
			<option value="">Selecione</option>
			<?php foreach($escolaridades as $option): ?>
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('escolaridade') == $option['id']) ? 'selected="true"' : ''; ?>><?php echo $option['titulo']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('escolaridade'); ?>
	</label>
	<label>
		<span>Estado Civil</span>
		<select name="estado_civil">
			<option value="">Selecione</option>
			<option value="1" <?php echo (set_value('estado_civil') == 1) ? 'selected="true"' : ''; ?>>Solteiro(a)</option>
			<option value="2" <?php echo (set_value('estado_civil') == 2) ? 'selected="true"' : ''; ?>>Casado(a)</option>
			<option value="3" <?php echo (set_value('estado_civil') == 3) ? 'selected="true"' : ''; ?>>Divorciado(a)</option>
			<option value="4" <?php echo (set_value('estado_civil') == 4) ? 'selected="true"' : ''; ?>>Viúvo(a)</option>
		</select>
		<?php echo form_error('estado_civil'); ?>
	</label>
	<label>
		<span>Nome Cônjuge</span>
		<input type="text" name="nome_conjuge" maxlength="90" value="<?php echo set_value('nome_conjuge'); ?>" />
		<?php echo form_error('nome_conjuge'); ?>
	</label>
	<label>
		<span>Pai</span>
		<input type="text" name="pai" maxlength="90" value="<?php echo set_value('pai'); ?>"/>
		<?php echo form_error('pai'); ?>
	</label>
	<label>
		<span>Mãe</span>
		<input type="text" name="mae" maxlength="90" value="<?php echo set_value('mae'); ?>"/>
		<?php echo form_error('mae'); ?>
	</label>
	<label>
		<span>Quant. Filhos</span>
		<input type="number" min="0" step="1" name="filhos" maxlength="2" value="<?php echo set_value('filhos'); ?>"/>
		<?php echo form_error('filhos'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Endereço</header>
	<label>
		<span>Rua</span>
		<input type="text" name="end_rua" maxlength="20" value="<?php echo set_value('end_rua'); ?>" required/>
		<?php echo form_error('end_rua'); ?>
	</label>
	<label>
		<span>Número</span>
		<input type="text" name="end_numero" maxlength="9" value="<?php echo set_value('end_numero'); ?>" required/>
		<?php echo form_error('end_numero'); ?>
	</label>
	<label>
		<span>Complemento</span>
		<input type="text" name="end_complemento" maxlength="20" value="<?php echo set_value('end_complemento'); ?>" />
		<?php echo form_error('end_complemento'); ?>
	</label>
	<label>
		<span>Bairro</span>
		<input type="text" name="end_bairro" maxlength="20" value="<?php echo set_value('end_bairro'); ?>" required/>
		<?php echo form_error('end_bairro'); ?>
	</label>
	<label style="display: block; float: left; width: 100%; padding: 0px;">
		<span>UF - Cidade</span>
		<select name="uf" style="width: 15%; min-width: 53px; margin-right: 6px;" required>
			<option value="">UF</option>
			<?php foreach($ufs as $option): ?>
				<option value="<?php echo $option['id']; ?>"><?php echo $option['sigla']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('uf'); ?>
		<select name="end_cidade" style="width: 50%; min-width: 136px;" disabled="true" required>
			<option>Sem Cidades</option>
		</select>
		<?php echo form_error('end_cidade'); ?>
	</label>
	<label>
		<span>CEP</span>
		<input type="text" name="end_cep" maxlength="10" value="<?php echo set_value('end_cep'); ?>" required/>
		<?php echo form_error('end_cep'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Contato</header>
	<label>
		<span>Tel. Fixo</span>
		<input type="text" class="tel" name="tel_fixo" maxlength="14" value="<?php echo set_value('tel_fixo'); ?>" required/>
		<?php echo form_error('tel_fixo'); ?>
	</label>
	<label>
		<span>Telefone 1</span>
		<input type="text" class="tel" name="tel1" maxlength="14" value="<?php echo set_value('tel1'); ?>" />
		<?php echo form_error('tel1'); ?>
	</label>
	<label>
		<span>Telefone 2</span>
		<input type="text" class="tel" name="tel2" maxlength="14" value="<?php echo set_value('tel2'); ?>" />
		<?php echo form_error('tel2'); ?>
	</label>
	<label>
		<span>Telefone 3</span>
		<input type="text" class="tel" name="tel3" maxlength="14" value="<?php echo set_value('tel3'); ?>" />
		<?php echo form_error('tel3'); ?>
	</label>
	<label>
		<span>E-mail 1</span>
		<input type="email" name="email1" maxlength="96" value="<?php echo set_value('email1'); ?>" required/>
		<?php echo form_error('email1'); ?>
	</label>
	<label>
		<span>E-mail 2</span>
		<input type="email" name="email2" maxlength="96" value="<?php echo set_value('email2'); ?>" />
		<?php echo form_error('email2'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Redes Sociais</header>
	<label>
		<span>Skype</span>
		<input type="text" name="skype" maxlength="90" value="<?php echo set_value('skype'); ?>" />
		<?php echo form_error('skype'); ?>
	</label>
	<label>
		<span>Facebook</span>
		<input type="email" name="facebook" maxlength="96" value="<?php echo set_value('facebook'); ?>" />
		<?php echo form_error('facebook'); ?>
	</label>
	<label>
		<span>WhatsApp</span>
		<input type="text" class="tel" name="whatsapp" maxlength="14" value="<?php echo set_value('whatsapp'); ?>" />
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
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('tipo_contrato') == $option['id']) ? 'selected="true"' : ''; ?>><?php echo $option['nome']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('tipo_contrato'); ?>
	</label>
	<label>
		<span>Remuneração</span>
		<input type="text" name="remuneracao" placeholder="00,00" onkeypress="return(MascaraMoeda(this,'.',',',event))" value="<?php echo set_value('remuneracao'); ?>" required/>
		<?php echo form_error('remuneracao'); ?>
	</label>
	
		<label class="mei-not-visible" style="display:none">
			<span>Razão social</span>
			<input type="text" name="mei_razao_social">
			<?php echo form_error('mei_razao_social'); ?>
		</label>

		<label class="mei-not-visible" style="display:none">
			<span>Nome Fantasia</span>
			<input type="text" name="mei_nome_fantasia">
			<?php echo form_error('mei_nome_fantasia'); ?>
		</label>

		<label class="mei-not-visible" style="display:none">
			<span>CNPJ</span>
			<input type="text" name="mei_cnpj">
			<?php echo form_error('mei_cnpj'); ?>
		</label>

		<label class="mei-not-visible" style="display:none">
			<span>Logradouro</span>
			<input type="text" name="mei_logradouro">
			<?php echo form_error('mei_logradouro'); ?>
		</label>

		<label class="mei-not-visible" style="display:none">
			<span>Bairro</span>
			<input type="text" name="mei_bairro">
			<?php echo form_error('mei_bairro'); ?>
		</label>

		<label class="mei-not-visible" style="display:none">
			<span>Número</span>
			<input type="text" name="mei_numero">
			<?php echo form_error('mei_numero'); ?>
		</label>

		<label class="mei-not-visible" style="display:none">
			<span>Cidade - Mei</span>
			<input type="text" name="mei_cidade">
			<?php echo form_error('mei_cidade'); ?>
		</label>


		<label class="mei-not-visible" style="display:none" >
			<span>Estado - Mei</span>
			<select name="mei_uf" style="width: 15%; min-width: 53px; margin-right: 6px;" >
				<option value="">UF</option>
				<?php foreach($ufs as $option): ?>
					<option value="<?php echo $option['id']; ?>"><?php echo $option['sigla']; ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('mei_uf'); ?>
		</label>
			

	<label>
		<span>Cargo</span>
		<select name="tipo" required>
			<option value="">Selecione</option>
			<?php 			
			$permissoes = array();			
			switch ($user_permission) {
				case 1 :
					$permissoes = array(2,5);
					break;
				case 2 :
					$permissoes = array(3,4);
					break;
				default:
					$permissoes = array();					
					break;
			}			
			foreach($tipos_usuario as $option): 
				if (in_array($option['cod_titulo'], $permissoes)) :
			?>
					<option value="<?php echo $option['cod_titulo']; ?>" <?php echo (set_value('tipo') == $option['cod_titulo']) ? 'selected="true"' : ''; ?>><?php echo $option['titulo']; ?></option>
			<?php 
				endif;
			endforeach;
			?>
		</select>
		<?php echo form_error('tipo'); ?>
	</label>
	 
	<?php 
	//if( $this->session->userdata('user_permissions') != 1 ): 
	if( 1 == 1 ): 

	?>

	<label style="display:none" id="label_superior">
		<span>Supervisor</span>
		<select name="superior">
			<option value="">Selecione</option>
			<?php foreach($usuarios as $option): ?>
				<option value="<?php echo $option['id']; ?>" <?php echo (set_value('superior') == $option['id']) ? 'selected="true"' : ''; ?>><?php echo $option['nome']; ?></option>
			<?php endforeach; ?>
		</select>
		<?php echo form_error('superior'); ?>

	<?php endif;?>

	</label>

	<div style="display:none" id="cidades-sup">
<label>
	<span>Cidades supervisionadas</span>
<table class="table" id="tabela_cidades">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th><a onClick="clearElements()" class="button edit small" title="Limpar cidades"><span></span></a></th>
    </tr> 
  </thead>  
  <tbody id="addEmpresaTbody">
    
  </tbody>  
  <tr>
    <td style="background: #555; color: #FFF">Adicionar nova:</td>
    <td style="background: #555; color: #FFF">    
      <input type="text" name="nome_cidade_supp" onclick="cancelEdit($('[class=\'editavel\']').html());" style="float: left" value="<?php echo set_value('nome_cidade_supp'); ?>" placeholder="Digite o nome da cidade" />
      <div id="errorNome"  style="float: left; margin-left: 10px;"></div>
    </td>
    <td style="background: #555; color: #FFF">
      <input type="button" class="button save small" rel="Adicionar Cidade" title="Adicionar Cidade" name="bt_add_cidade" value="Salvar nova cidade">   
    </td>
  </tr>
</table>

<input type="hidden" value="" name="current_id_cd">
</label>

</div>

	<label>
		<span>Data Admissão</span>
		<input type="text" class="dataa" name="data_admissao" maxlength="10" value="<?php echo set_value('data_admissao'); ?>" required/>
		<?php echo form_error('data_admissao'); ?>
	</label>
</section>
<section class="boxform" style="float: right;">
	<header>Sistema</header>
	<label>
		<span>Login</span>
		<input type="text" name="login" maxlength="15" value="<?php echo set_value('login'); ?>" required/>
		<?php echo form_error('login'); ?>
	</label>
	<label>
		<span>Senha</span>
		<input type="password" name="senha" maxlength="15"  value="<?php echo set_value('senha'); ?>" required/>
		<?php echo form_error('senha'); ?>
	</label>
	<label>
		<span>Observações</span>
		<textarea name="obs" maxlength="245" style="height: 60px;"><?php echo set_value('obs'); ?></textarea>
		<?php echo form_error('obs'); ?>
	</label>
	<label>
		<span>Ativo?</span>
		<?php echo form_checkbox(array(
			'name'		=> 'status',
			'value'		=> 1,
			'checked'	=> set_value('status') )); ?>
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

		$('[name="uf"]').change(function() {
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
	
	<script>
		$('[class="dataa"]').mask("00/00/0000", {placeholder: "__/__/____"});
		$('[name="end_cep"]').mask("00.000-000", {placeholder: "__.__-____"});
		$('[class="tel"]').mask("(00)0000-00000", {placeholder: "(__)____-_____"});
		$('[name="cpf"]').mask("999.999.999-99");
		$('[name="cnpj"]').mask("99.999.999/9999-99");
	</script>

	<script type="text/javascript">
     <?php
     // Caso seja um gerente se configura os horários
     if(isset($load_work_area)){  ?>
      $('#work_area').load("'"+ <?php echo $load_work_area ?>+"'");
     <?php } ?>
	</script>

	<script type="text/javascript">
	/*$('[name="add"]').on('click',function(evento){
		evento.preventDefault();
		var tippo = $('[name="tipo"]').val();
		// gerente
		if(tippo=='3'){
			$.ajax({
				url: "<?php echo base_url('usuarios/adicionarAjax'); ?>",
				data: $('#usuarios_add').serialize(),
				type: "POST",
				dataType: 'json'
			}).done(function( data ) {
				
				if($(data).length) {
					var id_gg = data.dados;
					console.log(data);
					$('#work_area').load('gerentes/configHorarios/'+id_gg);
				} else {
					// falha na inserção
				}
			});	
		}else{
			$('#usuarios_add').submit();
		}

	});*/
	</script>

	<script type="text/javascript">

	$('[name="tipo"]').change( function(){
		if( $(this).val() == 2 ){
			$('#cidades-sup').show(1000);
			$('#label_superior').hide(1000);
		}else{
			$('#cidades-sup').hide(1000);			
			$('#label_superior').show(1000);			
		}
	} );
	</script>


<script>


$( '[name="nome_cidade_supp"]' ).autocomplete({
      source: function( request, response ) {

        $.ajax({
          url: '<?php echo base_url()?>cidades/cidades_autocomplete',
          dataType: "json",
          type: "POST",
          data: {
            term: request.term
          },
          success: function( data ) {
            arr = [];           
            for (var i = 0; i < data.length; i++) {
             // if (data[i].status)
                arr.push({ label : data[i].nome_cidade+' - '+data[i].sigla_uf_cidade, value : data[i].id_cidade, status : data[i].status });
              //else
               // arr.push({ label : '** '+data[i].nome_cidade+' - '+data[i].sigla_uf_cidade, value : data[i].id_cidade, status : data[i].status });

            };  
            $( '#id_cidade' ).val('');
            response( arr );
          }
        });
      },
      minLength: 1,
      select: function( event, ui ) {
          setTimeout(function(){
            $( '[name="nome_cidade_supp"]' ).val(ui.item.label);
            $( '[name="current_id_cd"]' ).val(ui.item.value);
          },200);
      }
    });

  function verificaCidades(){
    var achou = 0;
    $('#tabela_cidades tbody tr td.id_cd').each( function( evento ){
      if( $(this).text() == $('[name="current_id_cd"]').val() ){
        achou = 1;
      }

    } );

    return (achou==1) ? true : false;
  }

  $('[name=bt_add_cidade]').click( function( evento ){
          
        if( verificaCidades() == true){
            console.log( 'A cidade já está na lista!' );
        }else{
            $("<tr><td align='left' class='id_cd' id='tdid" + $('[name="current_id_cd"]').val() + "'><input type='hidden' name='idscidades[]' value='" + $('[name="current_id_cd"]').val() + "'>" + $('[name="current_id_cd"]').val() + "</td><td align='left' id='tdnome" + $('[name="current_id_cd"]').val() + "'>" + $('[name="nome_cidade_supp"]').val() + "</td>" +
              "<td align='left' >" +
              "<a onClick=\" confirmDel('" + $('[name="current_id_cd"]').val() + "') \" class=\"button delete small\" rel=\"Excluir Cidade\" title=\"Excluir Cidade\"><span></span></a></td></tr>").appendTo($('#addEmpresaTbody'));
            $('[name="nome_cidade_supp"]').val('');
            $('[name="current_id_cd"]' ).val('');
        }
          
  } );

  function confirmDel( id_cd ){
     $('#tabela_cidades tbody tr td.id_cd').each( function( evento ){
      if( $(this).text() == id_cd ){
        $(this).parent().remove();
      }

    } );

  }

  function clearElements(  ){
  	 $('#tabela_cidades tbody tr td.id_cd').each( function( evento ){
        $(this).parent().remove();
    } );

  }

  $('[name="tipo_contrato"]').change( function( evento ){

  	if( $(this).val() == 3 ){
  		$('.mei-not-visible').show(1000);
  	}else{
  		$('.mei-not-visible').hide(1000);
  	}

  } );


  
</script>

