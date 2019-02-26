<?php

class Detalles_producto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    /**
     * Devuelve los datos correspondientes al producto seleccionado
     * @return array
     */
    public function get_producto($id) {
        $this->db->where('id_producto', $id);
        $query = $this->db->get('producto');
        return $query->result();
    }

}
