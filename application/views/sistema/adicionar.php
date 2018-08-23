<!-- gerenciamento/sistema/adicionar -->


<?php echo form_open_multipart(null,array('id'=> 'sistema_adicionar', 'autocomplete' => 'off')); ?>
	
	<div class="line">
		<label >
			<span class="label">Nome*</span>
			<input type="text" name="business_name"  value="<?php echo set_value('business_name'); ?>" />
			<?php echo form_error('business_name'); ?>
		</label>
	</div>

	<div class="line">
		<label >
			<span class="label">Slogan</span>
			<input type="text" name="business_slogan"  value="<?php echo set_value('business_slogan'); ?>" />
			<?php echo form_error('business_slogan'); ?>
		</label>
	</div>

	<div class="line">
		<label>
			<span class="label">Logo<small>(jpg|png|gif)</small></span>
			<input type="file" name="business_logo" value="<?php echo set_value('business_logo'); ?>" />
			<?php if($add->error == 'FILE_REQUIRED') : ?>
				<span class="error"><?php echo $add->message; ?></span>
			<?php endif ?>
			<?php if($add->error == 'UPLOAD_ERROR') : ?>
				<span class="error"><?php echo $add->message; ?></span>
			<?php endif ?>
		</label>
	</div>	

	<div class="line">
		<div class="buttons_holder">
			<?php echo submit_save('adicionar_configuracao', 'Salvar'); ?>
			<?php echo a_cancel(ADMIN_PATH.'/sistema', 'Cancelar') ?>
		</div>
	</div>

<?php echo form_close(); ?>