<?php if( $controller == 'auth' ):?>
<head>
        <!-- meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- style -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">



        <?php
        $view_path =  $controller . '/' .$view;

        echo $css_files;

        echo $js_files;


        echo r_favicon('icon/favicon', $extra_path);
        
        // $session = $this->session->userdata;

        ?>

        <title><?php echo $page_title; ?> :: Terra Viva</title>
    </head>
<?php endif; ?>


<?php if($controller != 'auth'  ) : ?>

	<!DOCTYPE html>
	<html lang="pt-BR">
	<head>
		<!-- meta -->
	 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<!-- style -->
		    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">



		<?php
		$view_path =  $controller . '/' .$view;

		echo $css_files;

		echo $js_files;

		echo r_favicon('icon/favicon', $extra_path);
		
		// $session = $this->session->userdata;

		?>

		<title><?php echo empty($page_title) ? "": $page_title; ?> :: Terra Viva</title>


	</head>

<body class="theme-indigo bg-white-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-indigo" stroke-width="4" />
                </svg>
            </div>
            <p>carregando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <nav class="navbar">

        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                  <div class="navbar-brand " style="margin-left: 50em auto"></div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                
                  <ul class="nav navbar-nav navbar-right">
                    <!-- #END# Tasks -->

                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>

            </div>
            <center>
               <div style="position:absolute;top: 1px;left: 42%;">
                    <img src="<?php echo base_url('src/img/logo_topo.svg')?>" width="200" height="68" alt="User" />
                </div>

          </center>
        </div>
          
    </nav>

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <!--img src="images/user.png" width="48" height="48" alt="User" /-->
                </div>
                
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU PRINCIPAL</li>
                    <li class="active">
                        <a href="<?php echo base_url('index.php/inicio') ?>">
                            <i class="material-icons">home</i>
                            <span>Principal</span>
                        </a>
                    </li>



                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_down</i>
                            <span>Produção</span>
                        </a>
                        <ul class="ml-menu">
                    
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Plano de saúde - Empresarial</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="<?php echo site_url('producao/psempresarial/pme/t') ?>">
                                            <span>Relatório - PME</span>
                                        </a>
                                    </li>
                                     
                                </ul>
                            </li>



                        </ul>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->

            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">CONTA</a></li>
                <li class="active"></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="indigo">
                              <i class="material-icons">exit_to_app</i>
                            <span><a href="<?php echo site_url('logout') ?>">Sair</a></span>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>


	<?php endif; // fim do primeiro IF?>
			<?php if($logged) : ?>				
				<?php if(isset($breadcrumbs)) : ?>
					<section id="breadcrumbs">
						<?php echo $breadcrumbs; ?>	
						<a href="<?php echo current_url(); ?>" onclick="" class="refresh">&nbsp;</a>

						<!--<?php echo current_url(); ?>-->
					</section><!-- #breadcrumbs -->
				<?php endif; ?>
			<?php endif; ?>

           
			<section class="content margin-0">
