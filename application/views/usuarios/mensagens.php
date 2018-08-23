<table class="table paginate">
		<thead>
			<tr>			
				<th>Mensagem</th>
				<th>Status</th>				
				<th></th>
				
			</tr>	
		</thead>	
		<tbody>
		<?php
		foreach ($mensagens as $key) :
			
		?>
			<tr>
				<td class="id_td"><?php echo $key['mensagem'] ?></td>
				<td>
					<?php 
					$color = 'lightgreen';
					$nome_status = '';
						if($key['status']==0):
							$color = 'lightblue';
							$nome_status = 'Não Lida';
						elseif($key['status']==1):
							$color = 'lightgreen';
						$nome_status = 'Lida';
						endif;
					?>
				<b style="background-color:<?php echo $color?>;"><?php echo $nome_status ?></b></td>			
				<td></td>
			</tr>
		<?php 
		endforeach;
		?>
		</tbody>
	</table>


<script type="text/javascript">
$(function(){
	$('table.paginate').dataTable();
	});
</script>