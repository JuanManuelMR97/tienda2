<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Registro_model');
    }

    public function index() {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('dni', 'DNI', 'required|valid_dni');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
        $this->form_validation->set_rules('cp', 'Código postal', 'required');
        $this->form_validation->set_rules('provincias', 'Provincia', 'required');
        $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email');
        $this->form_validation->set_rules('nombre_usuario', 'Nombre de usuario', 'required|is_unique[usuario.nombre_usuario]');
        $this->form_validation->set_rules('contraseña', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $this->Registro_model->insertar_usuario();
            redirect('Productos');
        }
    }

}
