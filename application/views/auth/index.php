
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login  - Terraviva</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('src/icons/favicon.ico'); ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('src/css/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('src/css/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('src/css/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('src/css/style.css')?>" rel="stylesheet">

     <?php
        /*$view_path =  $controller . '/' .$view;

        echo $css_files;

        //echo $js_files;

        echo r_favicon('icon/favicon', $extra_path);
        
        // $session = $this->session->userdata;*/

        ?>
</head>



<body class="login-page " >
    <div class="login-box ">
        <div class="logo">
            <a class="col-indigo" href="javascript:void(0);">IT Happens</b></a>
            <small class="col-indigo">Prova Prática</small>
        </div>
        <div class="card ">
        
         <!--div style="display:none" id="message-alert-lg" class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <p id="message-content-lg"></p>
                            </div-->

           


            <div class="body  box-login-border1">
               
                 <?php echo (isset($messages)) ? message_lot($messages) : null; ?>
                 
                <?php //if ( isset( $message_lg ) && $message_lg != 'FIRST_LOGIN' ):  ?>

                <?php echo form_open('auth', array('id'=>'login_form', 'autocomplete' => 'off')); ?>

                    <div class="msg">Faça login para iniciar sua sessão</div>
                    <div id="div-username" class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line ">
                            <input value="<?php echo set_value('username') ?>" type="text" class="form-control " name="username" placeholder="Usuário"  autofocus required>
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>
                    <div id="div-password" class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Senha" required>
                             <?php echo form_error('password'); ?>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-indigo">
                            <label for="rememberme">Lembrar-me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-indigo waves-effect" type="submit">Entrar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a class="col-indigo" id="link-form-registro" href="<?php echo base_url('index.php/auth/cadastro'); ?>">Cadastrar Usuário</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a class="col-indigo" href="#">Esqueceu sua senha?</a>
                        </div>
                    </div>
                </form>
            <?php // endif; // close form for signin ?>

             

            </div>
        </div>
    </div>

   
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('src/js/plugins/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('src/js/plugins/bootstrap/js/bootstrap.js')?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('src/js/plugins/node-waves/waves.js')?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url('src/js/plugins/jquery-validation/jquery.validate.js')?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('src/js/admin.js')?>"></script>
    <script src="<?php echo base_url('src/js/pages/examples/sign-in.js')?>"></script>
    

    <script type="text/javascript">
        $('.default-not-show').hide();                    //$('')
    </script>


     <script type="text/javascript">
         
        
        $('#link-form-registro').on('click', function(evento){
      /*      if( $('[name="username"]').val() == ''  ){
                 $('#message-content-lg').html('')
                 $('#message-content-lg').html('<center>Por favor, Preencha seu nome de usuário!</center>');
                 $('#message-alert-lg').slideDown('slow');
            }*/

            $('#login_form').hide();
            $('#cadastro_form').slideDown('slow');
        });

     </script>


</body>

</html>