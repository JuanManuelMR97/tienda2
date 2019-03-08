<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Devuelve la fila con los datos del usuario introducido en el caso de que 
     * exista su registro en la base de datos, de lo contrario devolverá un 
     * valor falso
     * @param string $nombre_usuario
     * @param string $contraseña
     * @return object/boolean
     */
    public function login_ok($nombre_usuario, $contraseña) {
        $this->db->where('nombre_usuario', $nombre_usuario);
        $this->db->where('contraseña', sha1($contraseña));
        $query = $this->db->get('usuario');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /**
     * Devuelve la fila con el id y el nombre del usuario correspondiente al 
     * correo introducido en el caso de que exista su registro en la base de 
     * datos, de lo contrario devolverá un valor falso
     * @param string $correo
     * @return int/boolean
     */
    public function existe_email($correo) {
        $this->db->select('id_usuario, nombre');
        $this->db->where('email', $correo);
        $query = $this->db->get('usuario');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /**
     * Restablece la contraseña correspondiente al id del usuario pasado como 
     * parámetro
     * @param int $id
     * @param string $pass
     */
    public function cambia_contraseña($id, $pass) {
        $datos = array(
            'contraseña' => sha1($pass)
        );
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $datos);
    }

    /**
     * Actualiza los datos correspondientes al id del usuario pasado como 
     * parámetro
     * @param int $id
     */
    public function modifica_datos($id) {
        $data = array(
            'dni' => $this->input->post('userdni'),
            'nombre' => $this->input->post('username'),
            'apellidos' => $this->input->post('surnames'),
            'direccion' => $this->input->post('address'),
            'codigo_postal' => $this->input->post('postalcode'),
            'provincia' => $this->input->post('provinces'),
            'email' => $this->input->post('useremail'),
            'nombre_usuario' => $this->input->post('user_name')
        );
        $this->db->where('id_usuario', $id);
        $this->db->update('usuario', $data);
        $this->session->set_userdata($data);
    }

    /**
     * Borra de la base de datos el registro correspondiente al id del usuario 
     * pasado como parámetro
     * @param int $id
     */
    public function borra_usuario($id) {
        $this->db->where('id_usuario', $id);
        $this->db->delete('usuario');
    }

    public function get_usuario() {
        $this->db->where('id_usuario', $this->session->userdata('id_usuario'));
        $query = $this->db->get('usuario');
        return $query->row();
    }

}
