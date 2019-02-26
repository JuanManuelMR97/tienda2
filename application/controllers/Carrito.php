<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('form');
        $this->load->model('Carrito_model');
    }

    public function index() {
        $this->load->view('carrito');
    }

    /**
     * Añade al carrito el producto seleccionado
     * @param int $id
     */
    public function agregar_producto($id) {
        $producto = $this->Carrito_model->producto_selc($id);
        $cantidad = $this->input->post('cant');

        $carrito = $this->cart->contents(); //Obtenemos el contenido del carrito

        foreach ($carrito as $item) {
            //Si el id del producto es igual al de uno que ya tengamos en el carrito
            //le sumamos la cantidad introducida a la cantidad que tenía anteriormente
            if ($item['id'] == $id) {
                $item['qty'] += $cantidad;
            }
        }

        //Recogemos los productos en un array para insertarlos en el carrito
        $data = array(
            'id' => $id,
            'qty' => $cantidad,
            'price' => $producto->precio_venta,
            'name' => $producto->nombre,
            'img' => $producto->imagen,
            'cod' => $producto->codigo
        );

        $this->cart->insert($data);
        redirect('Carrito');
    }

    /**
     * Elimina del carrito el producto seleccionado
     * @param string $rowid
     */
    public function eliminar_producto($rowid) {
        //Para eliminar un producto concreto conseguimos su rowid 
        //y ponemos qty (la cantidad) a 0
        $producto = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        //Actualizamos el carrito pasando el array del producto eliminado
        $this->cart->update($producto);
        redirect('Carrito');
    }

    /**
     * Actualiza el carrito en el caso de que se hayan modificado las cantidades 
     * de los productos del mismo
     */
    public function actualizar_carrito() {
        foreach ($this->cart->contents() as $item) {
            $item['qty'] = $this->input->post($item['rowid']);
        }
        $this->cart->update($item);
        redirect('Carrito');
    }

    /**
     * Destruye el carrito
     */
    public function eliminar_carrito() {
        $this->cart->destroy();
        redirect('Carrito');
    }

}
