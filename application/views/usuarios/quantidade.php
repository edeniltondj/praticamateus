<!-- gerenciamento/produtos/adicionar -->
<?php echo form_open(NULL,array('id'=> 'quantidade_adicionar', 'autocomplete' => 'off'));?>
	
	<div class="line">
		<label>
			<span class="label">Quantidade*</span>
			<input type="text" name="pi_amount" value="<?php echo set_value('pi_amount'); ?>" />
			<?php echo form_error('pi_amount'); ?>
		</label>
	</div>
	
	<div class="line">
		<div class="buttons_holder">
			<?php echo submit_save('quantidade_adicionar', 'Salvar'); ?>
			<?php echo a_cancel(ADMIN_PATH.'/produtos', 'Cancelar') ?>
		</div>
	</div>

<?php echo form_close(); ?>