<!-- gerenciamento/sistema/adicionar <--> </-->
<script>
        tinymce.init({selector:'textarea'});
</script>

<?php echo form_open_multipart(null,array('id'=> 'configuracao_adicionar', 'autocomplete' => 'off')); ?>
	
	<div class="line">
		<label >
			<span class="label">Título</span>
			<input type="text" name="config_site_title"  value="<?php echo (set_value('config_site_title')) ? set_value('config_site_title'):$configuracao['config_site_title']; ?>" />
			<?php echo form_error('config_site_title'); ?>
		</label>
	</div>

	<div class="line">
		<label >
			<span class="label">Subtítulo</span>
			<input type="text" name="config_site_subtitle"  value="<?php echo (set_value('config_site_subtitle')) ? set_value('config_site_subtitle'):$configuracao['config_site_subtitle']; ?>" />
			<?php echo form_error('config_site_subtitle'); ?>
		</label>
	</div>

	<div class="line">
		<label >
			<span class="label">Sobre</span>
			<textarea name="config_site_about" rows=3><?php echo (set_value('config_site_about')) ? set_value('config_site_about'):$configuracao['config_site_about']; ?></textarea>
			<?php echo form_error('config_site_about'); ?>
		</label>
	</div>

	<div class="line">
		<label >
			<span class="label">Endereço</span>
			<textarea name="config_site_address" rows=3><?php echo (set_value('config_site_address')) ? set_value('config_site_address'):$configuracao['config_site_address']; ?></textarea>
			<?php echo form_error('config_site_address'); ?>
		</label>
	</div>

	<div class="line">
		<label >
			<span class="label">Contatos</span>
			<textarea name="config_site_contact" rows=3><?php echo (set_value('config_site_contact')) ? set_value('config_site_contact'):$configuracao['config_site_contact']; ?></textarea>
			<?php echo form_error('config_site_contact'); ?>
		</label>
	</div>

	<div class="line">
		<label >
			<span class="label">E-mail</span>
			<input type="text" name="config_site_email"  value="<?php echo (set_value('config_site_email')) ? set_value('config_site_email'):$configuracao['config_site_email']; ?>" />
			<?php echo form_error('config_site_email'); ?>
		</label>
	</div>

	<div class="line">
		<label>
			<span class="label">Logomarca atual</span>	
			<div class="buttons_holder">			
				<?php echo r_img('/uploads/configs/'.$configuracao['config_site_logo'],'Imagem da Logomarca',array('height'=> '100'));?> 
			</div>
		</label>	
	</div>
	<!--
	<div class="line">
		<label>
			<span class="label">Deseja deletar a imagem?</span>
			<input type="checkbox" value="1" name="remove_image" />
		</label>
	</div>
	-->
	<div class="line">
		<label>
			<span class="label">Deseja trocar a imagem?</span>
			<input type="checkbox" value="1" class="load_file" name="change_image" />
			<?php if($UPDATE->error == 'FILE_REQUIRED') : ?>
					<span class="error"><?php echo $UPDATE->message; ?></span>
			<?php endif ?>
		</label>
	</div>

	<input type="hidden" name="hidden_image" value="<?php echo $configuracao['config_site_logo']; ?>" />
	<div class="line" id="image" style="display:none;">
		<br>
		<label>
			<span class="label">Nova imagem*<small>(jpg|png|gif)</small></span>
			<input type="file" name="config_site_logo" value="<?php echo set_value('config_site_logo'); ?>" />				
			<?php if($UPDATE->error == 'UPLOAD_ERROR') : ?>
				<span class="error"><?php echo $UPDATE->message; ?></span>
			<?php endif ?>
		</label>
		<br><br>		
	</div>	


	<div class="line">
		<div class="buttons_holder">
			<?php echo submit_confirm('adicionar_configuracao', 'Salvar'); ?>
			<?php echo a_cancel(ADMIN_PATH.'/sistema', 'Cancelar') ?>
		</div>
	</div>

<?php echo form_close(); ?>