<!-- gerenciamento/produtos/adicionar -->
<?php echo form_open_multipart(null,array('id'=> 'produtos_adicionar', 'autocomplete' => 'off')); ?>
	<?php echo validation_errors();?>
	<div class="line">
		<label><span class="label">Categorias*</span>
			<?php echo form_dropdown('p_category_id', $category, 
			(set_value('p_category_id')) ? set_value('p_category_id') : $produto['p_category_id']); ?>
			<?php echo form_error('p_category_id'); ?>
		</label>
	</div>
	<div class="line">
		<label >
			<span class="label">Nome*</span>
			<input type="text" name="p_name"  value="<?php echo (set_value('p_name')) ? set_value('p_name') : $produto['p_name']; ?>" />
			<?php echo form_error('p_name'); ?>
		</label>
	</div>

	<div class="line">
		<label>
			<span class="label">Un. de medida*</span>
			<?php echo form_dropdown('p_measure_id', $measure, 
			(set_value('p_measure_id')) ? set_value('p_measure_id') : $produto['p_measure_id']); ?>
			<?php echo form_error('p_measure_id'); ?>
		</label>
	</div>
	
	<div class="line">
		<label>
			<span class="label">Código*</span>
			<input type="text" name="p_cod" id="p_cod" value="<?php echo (set_value('p_cod')) ? set_value('p_cod'): $produto['p_cod']; ?>">
			<?php echo form_error('p_cod')?>
		</label>
	</div>

	<div class="line">
		<label>
			<span class="label">Preço*</span>
			<input type="text" class="price" name="p_price" id="p_price" value="<?php echo (set_value('p_price')) ? set_value('p_price'): $produto['p_price']; ?>">
			<?php echo form_error('p_price')?>
		</label>
	</div>

	<div class="line">
		<label>
			<span class="label">Estoque mínimo*</span>
			<input type="text" name="p_minimal_inventory" id="p_minimal_inventory" value="<?php echo (set_value('p_minimal_inventory')) ? set_value('p_minimal_inventory') : $produto['p_minimal_inventory'] ; ?>">
			<?php echo form_error('p_minimal_inventory')?>
		</label>
	</div>

	<div class="line">	
		<label>
			<span class="label">Tempo de preparo<small>média em minutos</small></span>
			<input type="text" name="p_sla" value="<?php echo (set_value('p_sla')) ? set_value('p_sla') : $produto['p_sla']; ?>" />
			<?php echo form_error('p_sla'); ?>
		</label>
	</div>
	
	<div class="line">	
		<label>
			<span class="label">Descrição</span>
			<textarea type="text" name="p_description" >
				<?php echo (set_value('p_description')) ? set_value('p_description') : $produto['p_description'] ; ?>
			</textarea>	
			<?php echo form_error('p_description'); ?>
		</label>
	</div>

	<div class="line">
		<label>
			<span class="label">Imagem atual</span>	
			<div class="buttons_holder">			
				<?php echo r_img('/uploads/products/'.$produto['p_image'],'Imagem do Produto',array('height'=> '100'));?> 
			</div>
		</label>	
	</div>
	
	<div class="line">
		<label>
			<span class="label">Deseja trocar a imagem?</span>
			<input type="checkbox" value="1" class="load_file" name="change_image" />
			<?php if($UPDATE->error == 'FILE_REQUIRED') : ?>
					<span class="error"><?php echo $UPDATE->message; ?></span>
			<?php endif ?>
		</label>
	</div>

	<input type="hidden" name="hidden_image" value="<?php echo $produto['p_image']; ?>" />
	<div class="line" id="image" style="display:none;">
		<br>
		<label>
			<span class="label">Nova imagem*<small>(jpg|png|gif)</small></span>
			<input type="file" name="p_image" value="<?php echo set_value('p_image'); ?>" />				
			<?php if($UPDATE->error == 'UPLOAD_ERROR') : ?>
				<span class="error"><?php echo $UPDATE->message; ?></span>
			<?php endif ?>
		</label>
		<br><br>		
	</div>	

	<div class="line">
		<div class="buttons_holder">
			<?php echo submit_confirm('adicionar_produto', 'Salvar'); ?>
			<?php echo a_cancel(ADMIN_PATH.'/produtos', 'Cancelar') ?>
		</div>
	</div>
	
<?php echo form_close(); ?>