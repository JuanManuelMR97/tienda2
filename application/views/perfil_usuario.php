<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil de usuario | R-Shop</title>
        <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/home/simbolo.png"> 
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/price-range.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/main.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet">  
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head>

    <body>
        <?php $this->load->view('plantilla/encabezado'); ?>

        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="login-form">
                            <h2>Perfil de usuario</h2>
                            <?= form_open(site_url('Login/actualiza_perfil/' . $id)); ?>
                                Nombre: <input type="text" name="username" value="<?= $this->session->userdata('nombre'); ?>" />
                                <?= form_error('username'); ?>
                                Apellidos: <input type="text" name="surnames" value="<?= $this->session->userdata('apellidos'); ?>" />
                                <?= form_error('surnames'); ?>
                                DNI: <input type="text" name="userdni" value="<?= $this->session->userdata('dni'); ?>"/>
                                <?= form_error('userdni'); ?>
                                Dirección: <input type="text" name="address" value="<?= $this->session->userdata('direccion'); ?>" />
                                <?= form_error('address'); ?>
                                Código postal: <input type="text" name="postalcode" value="<?= $this->session->userdata('cp'); ?>" />
                                <?= form_error('postalcode'); ?>
                                Provincia: <?= form_dropdown('provinces', dbresult_to_array(get_provincias(), 'cod', 'nombre'), $this->session->userdata('provincia')); ?>
                                <?= form_error('provinces'); ?>
                                Correo electrónico: <input type="text" name="useremail" value="<?= $this->session->userdata('email'); ?>" />
                                <?= form_error('useremail'); ?>
                                Nombre de usuario: <input type="text" name="user_name" value="<?= $this->session->userdata('nombre_usuario'); ?>" />
                                <?= form_error('user_name'); ?>
                                <button type="submit" class="btn btn-default botones">Aplicar cambios</button>
                                <a href="<?= site_url('Login/elimina_cuenta/' . $id); ?>" class="btn btn-default botones update" id="boton">Eliminar cuenta</a>
                            <?= form_close(); ?>
                        </div><!--/login form-->
                    </div>                    
                </div>
            </div>
        </section><!--/form-->

        <?php $this->load->view('plantilla/pie'); ?>


        <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/js/price-range.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.prettyPhoto.js"></script>
        <script src="<?= base_url(); ?>assets/js/main.js"></script>
    </body>
</html>