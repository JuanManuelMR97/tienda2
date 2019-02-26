<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cesta | R-Shop</title>
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

        <?= form_open(site_url('Carrito/actualizar_carrito')); ?>
            <section id="cart_items">
                <div class="container">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Artículo</td>
                                    <td class="description">Descripción</td>
                                    <td class="price">Precio</td>
                                    <td class="quantity">Cantidad</td>
                                    <td class="total">Subtotal</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->cart->contents() as $item): ?>
                                    <tr>
                                        <td class="cart_product">
                                            <a href=""><img src="<?= base_url() . $item['img'] ?>" alt="" height="110" width="110"></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href=""><?= $item['name'] ?></a></h4>
                                            <p>Código: <?= $item['cod'] ?></p>
                                        </td>
                                        <td class="cart_price">
                                            <p><?= $item['price'] ?> €</p>
                                        </td>
                                        <td class="cart_price">
                                            <input type="text" name="<?= $item['rowid'] ?>" value="<?= $item['qty'] ?>" size="5">
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price"><?= $item['subtotal'] ?> €</p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href="<?= site_url('Carrito/eliminar_producto/' . $item['rowid']); ?>"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section> <!--/#cart_items-->

            <section id="do_action">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <li>Subtotal <span><?= $this->cart->total(); ?> €</span></li>
                                    <li>IVA <span>21%</span></li>
                                    <li>Gastos de envío <span>Gratis</span></li>
                                    <li>Total <span><?= number_format($this->cart->total() * 1.21, 2); ?> €</span></li>
                                </ul>
                                <input type="submit" class="btn btn-default update updatecart" value="Actualizar cesta">
                                <a class="btn btn-default update" href="<?= site_url('Carrito/eliminar_carrito'); ?>">Vaciar cesta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--/#do_action-->
        <?= form_close(); ?>

        <?php $this->load->view('plantilla/pie'); ?>


        <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/jquery.prettyPhoto.js"></script>
        <script src="<?= base_url(); ?>assets/js/main.js"></script>
    </body>
</html>