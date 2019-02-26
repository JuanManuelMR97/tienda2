<?php

class Registro_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Inserta la fila con los datos del nuevo usuario en la base de datos y 
     * crea la sesión con esos datos
     */
    public function insertar_usuario() {
        $datos = array(
            'dni' => $this->input->post('dni'),
            'nombre' => $this->input->post('nombre'),
            'apellidos' => $this->input->post('apellidos'),
            'direccion' => $this->input->post('direccion'),
            'codigo_postal' => $this->input->post('cp'),
            'provincia' => $this->input->post('provincias'),
            'email' => $this->input->post('email'),
            'nombre_usuario' => $this->input->post('nombre_usuario'),
            'contraseña' => sha1($this->input->post('contraseña'))
        );
        $this->db->insert('usuario', $datos);

        $registrado = array(
            'login' => TRUE,
            'id_usuario' => $this->id_usuario,
            'nombre_usuario' => $this->input->post('nombre_usuario')
        );
        $this->session->set_userdata($registrado);
    }

}
