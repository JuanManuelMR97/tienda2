<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Importar categorías | R-Shop</title>
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
                        <div class="login-form"><!--login form-->
                            <h2>Importa un fichero XML de las categorías</h2>
                            <?= form_open_multipart('Productos/importar_xml_categorias'); ?>
                                <input type="file" name="file">
                                <button type="submit" class="btn btn-default">Enviar</button>
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