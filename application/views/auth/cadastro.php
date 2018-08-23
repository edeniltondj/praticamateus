<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cadastro  - Terraviva</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('src/icons/favicon.ico') ?>" type="image/x-icon">

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



    <body class="login-page" >
        <div class="login-box">
            <div class="logo">
                <a class="col-indigo" href="javascript:void(0);">Terra Viva</b></a>
                <small class="col-indigo">Gerenciamento de Relatórios</small>
            </div>
            <div class="card">



                <div class="body  box-login-border1">

                    <div class="msg"> <a class="col-indigo" id="link-form-registro" href="<?php echo base_url('index.php/auth'); ?>">Voltar para Login</a></div>
                   <div  id="message-alert-lg" class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p id="message-content-lg">
                     <center>Digite seu nome de usuário já registrado para que você habilite e registre uma nova senha e email para acessar o sistema web</center>

                 </p>
             </div>

             <div id="div-preloader-username" >

             </div>




             <!--Formulário de cadastro-->

             <?php //if( isset( $message_lg )  && $message_lg == 'FIRST_LOGIN' ): ?>

             <?php echo form_open('auth/cadastro', array('id'=>'cadastro_form', 'autocomplete' => 'off')); ?>

             <div id="div-username" class="input-group">

                <span class="input-group-addon">
                    <i class="material-icons">person</i>
                </span>
                <div id="div-form-line-username" class="form-line">
                    <input type="text" class="form-control" name="username-cad" id="username-cad" placeholder="Usuário" required autofocus>
                    <?php echo form_error('username-cad') ?>
                </div>
            </div>

            <div id="div-password-cad" class="input-group default-not-show">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line" >
                    <input  required type="password" class="form-control" name="password-cad" placeholder="Senha" >
                    <?php echo form_error('password-cad') ?>
                </div>
            </div>

            <div id="div-password-confirmation" class="input-group default-not-show">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                    <input required type="password" class="form-control" name="password-confirmation-cad" placeholder="Confirmar Senha" >
                    <?php echo form_error('username-confirmation-cad') ?>
                </div>
            </div>

            <div id="div-email" class="input-group default-not-show">
                <span class="input-group-addon">
                    <i class="material-icons">email</i>
                </span>
                <div class="form-line">
                    <input required type="email" class="form-control" name="email-cad" placeholder="Email" >
                    <?php echo form_error('email-cad') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4" style="float:right">
                    <button  class="btn btn-block bg-indigo waves-effect default-not-show" type="submit">Registrar</button>
                </div>
            </div>

        </form>




        <?php // endif; //close if for cadastro form ?>

    </div>
</div>
</div>

<!-- Jquery Core Js -->
<script src="<?php echo base_url('src/js/plugins/jquery/jquery.min.js')?>"></script>



<!-- Bootstrap Core Js -->
<script src="<?php echo base_url('src/js/plugins/bootstrap/js/bootstrap.js')?>"></script>

<!-- Bootstrap notification Core Js -->
<script src="<?php echo base_url('src/js/plugins/bootstrap-notify/bootstrap-notify.js')?>"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url('src/js/plugins/node-waves/waves.js')?>"></script>

<!-- Validation Plugin Js -->
<script src="<?php echo base_url('src/js/plugins/jquery-validation/jquery.validate.js')?>"></script>

<!-- Custom Js -->
<script src="<?php echo base_url('src/js/admin.js')?>"></script>
<script src="<?php echo base_url('src/js/pages/examples/sign-in.js')?>"></script>


<script type="text/javascript">
                    //$('')
                </script>


                <script type="text/javascript">
                   $(function(){
                      $('.default-not-show').hide();
                  });


                   $('.close').on('click', function(event){
                       $(this).slideUp('slow');
                   } );
               </script>

               <script type="text/javascript">

                  $('#username-cad').keyup(function () {

                   $.ajax({
                       type: 'POST',
                       url: 'verificaUsuarioAjax',
                       dataType: 'json',
                       data: { 'username-ajax' : $(this).val() },
                       success : function(result){
                          if( result == 'true' ){
                             $('.default-not-show').show('slow');
                             $('#div-form-line-username').removeClass('focused error');
                             $('#div-form-line-username').addClass('focused success');

                         }else{
                             $('.default-not-show').hide('slow');
                             $('#div-form-line-username').removeClass('focused success');
                             $('#div-form-line-username').addClass('focused error');
                             
                             if( result=='registered' ){
                                $.notify({
                                        // options
                                        message: 'Esse usuário já está regsitrado!',
                                        icon: 'account_circle' 
                                    },{
                                        // settings
                                        type: 'danger'
                                    });
                             }

                         }
                     }
                 });
               });

           </script>

       </body>

       </html>