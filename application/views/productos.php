<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio | R-Shop</title>
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

        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                                <li data-target="#slider-carousel" data-slide-to="3"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-11">
                                        <img src="<?= base_url(); ?>assets/img/home/adidas.jpg" class="girl img-responsive" alt="" />
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-11">
                                        <img src="<?= base_url(); ?>assets/img/home/nike.png" class="girl img-responsive" alt="" />
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-11">
                                        <img src="<?= base_url(); ?>assets/img/home/nb.jpg" class="girl img-responsive" alt="" />
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-11">
                                        <img src="<?= base_url(); ?>assets/img/home/asics.jpg" class="girl img-responsive" alt="" />
                                    </div>
                                </div>

                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--/slider-->

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Categorías</h2>
                            <div class="panel-group category-products"><!--category-productsr-->
                                <?php foreach (get_categorias() as $categoria): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="<?= site_url('Productos/por_categorias/' . $categoria->id_categoria); ?>"><?= $categoria->nombre ?></a></h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div><!--/category-products-->

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Destacados</h2>
                            <?php foreach ($productos as $producto): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= base_url() . $producto->imagen ?>" alt="" />
                                                <h2><?= $producto->precio_venta ?> €</h2>
                                                <p><?= $producto->nombre ?></p>
                                                <a href="<?= site_url('Detalles_producto/get_zapatilla/' . $producto->id_producto); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2><?= $producto->precio_venta ?> €</h2>
                                                    <p><?= $producto->nombre ?></p>
                                                    <a href="<?= site_url('Detalles_producto/get_zapatilla/' . $producto->id_producto); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div><!--features_items-->
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3 text-center">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php $this->load->view('plantilla/pie'); ?>


        <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/price-range.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.prettyPhoto.js"></script>
        <script src="<?= base_url(); ?>assets/js/main.js"></script>
    </body>
</html>