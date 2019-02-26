<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Productos_model');
    }

    public function index() {
        redirect('Productos/destacados');
    }

    /**
     * Carga en la vista principal los productos destacados paginados
     */
    public function destacados() {
        $config['base_url'] = site_url('Productos/destacados/');
        $config['total_rows'] = $this->Productos_model->filas_destacados();
        $config['per_page'] = 6; //Número de registros mostrados por páginas
        $this->pagination->initialize($config); //Inicializamos la paginación
        $data['productos'] = $this->Productos_model->total_destacados($config['per_page'], $this->uri->segment(3));

        $this->load->view('productos', $data);
    }

    /**
     * Carga en la vista principal los productos paginados de la categoría seleccionada
     * @param int $categoria_id
     */
    public function por_categorias($categoria_id) {
        $config['base_url'] = site_url('Productos/por_categorias/' . $categoria_id);
        $config['total_rows'] = $this->Productos_model->filas_por_categorias($categoria_id);
        $config['per_page'] = 6;
        $this->pagination->initialize($config);
        $data['productos'] = $this->Productos_model->total_por_categorias($categoria_id, $config['per_page'], $this->uri->segment(4));

        $this->load->view('productos', $data);
    }

}
