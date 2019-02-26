<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }

    public function index() {
        if ($this->session->userdata('login')) {
            redirect('Productos');
        } else {
            $this->load->view('login');
        }
    }

    /**
     * Crea la sesión
     */
    public function login() {
        //Lanzamos mensajes de error si los hay
        $this->form_validation->set_rules('user_name', 'Nombre de usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nombre_usuario = $this->input->post('user_name');
            $contraseña = $this->input->post('password');
            $conectado = $this->Login_model->login_ok($nombre_usuario, $contraseña);

            if ($conectado) {
                $datos = array(
                    'login' => TRUE,
                    'id_usuario' => $conectado->id_usuario,
                    'nombre_usuario' => $conectado->nombre_usuario
                );
                //Agregamos los datos del usuario logueado a la sesión
                $this->session->set_userdata($datos);
                $this->index();
            }
        }
    }

    /**
     * Elimina la sesión
     */
    public function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

    /**
     * Carga la vista que muestra el formulario previo al envio del mensaje de 
     * confirmación para restablecer la contraseña del usuario
     */
    public function carga_ayuda() {
        $this->load->view('ayuda_identificacion');
    }

    /**
     * Envia un email haciendo uso de SMTP con gmail
     */
    public function sendMailGmail() {
        $this->form_validation->set_rules('correo', 'Correo electrónico', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->carga_ayuda();
        } else {
            $this->email->from('segundodaw2019@gmail.com');
            $this->email->to($this->input->post('correo'));
            $this->email->subject('Confirma que eres tú para acceder a tu cuenta de R-Shop');
            $this->email->message('<p>Selecciona "confirmar" para verificar tu identidad y acceder a tu cuenta.</p>'
                    . '<a href="' . site_url('Login/carga_restablecer/' . $this->Login_model->existe_email($this->input->post('correo'))) . '">Confirmar</a>');
            $this->email->send();
        }
    }

    /**
     * Carga la vista que muestra el formulario previo a la hora de restablecer 
     * la contraseña del usuario
     */
    public function carga_restablecer($id) {
        $this->load->view('restablecer_contraseña', ['id' => $id]);
    }

    public function restore_pass($id) {
        $this->Login_model->cambia_contraseña($id, $this->input->post('newpass'));
    }

}
