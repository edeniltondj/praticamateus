<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	
	<?php
	$view_path = $extra_path . '/' . $controller . '/' .$view;

	echo $css_files;

	echo $js_files;

	echo r_favicon('icon/favicon', $extra_path);
	?>

	<title><?php echo $page_title; ?> :: Sistema Solar :: Painel Administrativo</title>
</head>
<body>
	
	<section id="panel">
					<?php if($menu) : ?>
			<nav id="menu">
				<header id="logo2"></header>
				<ul>
					<li class="start <?php echo ($controller == 'inicio') ? 'active' : NULL; ?>">
						<a href="<?php echo base_url('inicio'); ?>">
							<span class="icon"></span>
							<span class="text">Início</span>
						</a>
					</li>
					<li class="emplo <?php echo ($controller == 'usuarios') ? 'active' : NULL; ?>" >
						<a href="<?php echo base_url('usuarios'); ?>">
							<span class="icon"></span>
							<span class="text">Usuários</span>
						</a>
					</li>
					<li class="custo havesubmenu<?php echo ($controller == 'clientes') ? 'active' : NULL; ?>"
						onmouseover="document.getElementById('submenu_financeiro').style.display = 'block'"
						onmouseout="document.getElementById('submenu_financeiro').style.display = 'none'">
						<a href="<?php echo base_url('clientes'); ?>">
							<span class="icon"></span>
							<span class="text">Financeiro</span>
						</a>
					</li>
					<li class="categ <?php echo ($controller == 'categorias') ? 'active' : NULL; ?>">
						<a href="<?php echo base_url('categorias'); ?>">
							<span class="icon"></span>
							<span class="text">Alunos</span>
						</a>
					</li>
					<li class="produ havesubmenu<?php echo ($controller == 'produtos') ? 'active' : NULL; ?>">
						<a href="<?php echo base_url('produtos'); ?>">
							<span class="icon"></span>
							<span class="text">Cursos</span>
						</a>
					</li>
					<li class="repor havesubmenu<?php echo ($controller == 'relatorios') ? 'active' : NULL; ?>">
						<a href="<?php echo base_url('relatorios'); ?>">
							<span class="icon"></span>
							<span class="text">Cont. Site</span>
						</a>
					</li>
					<li class="syste <?php echo ($controller == 'sistema' || $controller == 'mesas' || $controller == 'tokens') ? 'active' : NULL; ?>">
						<a href="<?php echo base_url('sistema'); ?>">
							<span class="icon"></span>
							<span class="text">Contatos</span>
						</a>
					</li>
				</ul>
				<ul id="submenu_financeiro" 
				onmouseover="document.getElementById('submenu_financeiro').style.display = 'block'"
						onmouseout="document.getElementById('submenu_financeiro').style.display = 'none'">
						<?php echo r_img('img/submenu1.png', 'submenu1', array('id'=>'submenu1'), $extra_path); ?>
					<li class="adicionar <?php echo ($controller == 'adicionar') ? 'active' : NULL; ?>">
						<a href="<?php echo base_url('adicionar'); ?>">
							<span class="icon"></span>
							<span class="text">adicionar</span>
						</a>
					</li>
					<li class="logs <?php echo ($controller == 'usuarios') ? 'active' : NULL; ?>">
						<a href="<?php echo base_url('usuarios'); ?>">
							<span class="icon"></span>
							<span class="text">ver logs</span>
						</a>
					</li>
				</ul>
			</nav><!-- #menu -->
			<?php endif; ?>

			<?php if($logged) : ?>
			<header id="header_logged">
						
			<section id="session">

					<section id="user">
						<?php echo r_img('img/photo.png', 'photo', array('id'=>'photo'), $extra_path); ?>	
						<span id="user_info">Webmaster<?php //echo $session->usuario_nome; ?></span>
					<br><br>
						<section id="logout_button">
							<a id="sair_button" href="<?php echo base_url('logout'); ?>"><?php echo r_img('img/sair.png', 'Sair', array('id'=>'sair'), $extra_path); ?>Sair</a>
							<a id="editar_button" href="<?php echo base_url('logout'); ?>"><?php echo r_img('img/editar.png', 'Editar', array('id'=>'editar'), $extra_path); ?>editar dados</a>
						</section>
					</section>
			</section><!-- #session -->
			<?php else: ?>
			<header id="header">
			<section id="logo"><?php echo r_img('img/logo.png', 'flexRestaurant', array('height'=>70), $extra_path); ?></section><!-- #logo -->
			<?php endif; ?>

		</header><!-- #header -->

		<section id="content" class="<?php echo str_replace('/', '_', $extra_path).'_'.$controller.'_'.$view; ?>">
			
			<?php if(isset($breadcrumbs)) : ?>
			<section id="breadcrumbs"><?php echo $breadcrumbs; ?></section>
			<?php endif; ?>

			<div class="clear"></div>


			<main id="work_box">
				<!--<header><?php echo ($page_subtitle != NULL) ? $page_subtitle : $page_title; ?> <a title="Atualizar página" href="<?php echo current_url(); ?>" class="button refresh">&nbsp;</a></header> -->
				<?php if(isset($messages)) : ?>
				<div id="messages">
					<?php echo message_lot($messages); ?>	
				</div>
				<?php endif; ?>
				<section>