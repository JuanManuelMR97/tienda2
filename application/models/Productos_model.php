<?php

class Productos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Devuelve el total de filas para hacer la paginación de los 
     * productos destacados
     * @return int
     */
    public function filas_destacados() {
        $this->db->where('destacado', TRUE);
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    /**
     * Devuelve el total de filas para hacer la paginación de los 
     * productos de la categoría seleccionada
     * @param int $categoria
     * @return int
     */
    public function filas_por_categorias($categoria) {
        $this->db->where('categoria_id', $categoria);
        $consulta = $this->db->get('producto');
        return $consulta->num_rows();
    }

    /**
     * Devuelve todos las productos destacados a paginar
     * @param int $por_pagina
     * @param int $segmento
     * @return array
     */
    public function total_destacados($por_pagina, $segmento) {
        $this->db->where('destacado', TRUE);
        $query = $this->db->get('producto', $por_pagina, $segmento);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

    /**
     * Devuelve todos las productos a paginar de la categoría pasada como parámetro
     * @param int $categoria
     * @param int $por_pagina
     * @param int $segmento
     * @return array
     */
    function total_por_categorias($categoria, $por_pagina, $segmento) {
        $this->db->where('categoria_id', $categoria);
        $query = $this->db->get('producto', $por_pagina, $segmento);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $fila) {
                $data[] = $fila;
            }
            return $data;
        }
    }

}
