<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Devuelve un array asociativo con el formato clave => valor
 * @param array $rs
 * @param string $clave
 * @param string $valor
 * @return array
 */
function dbresult_to_array($rs, $clave, $valor) {
    $res = [];
    foreach ($rs as $reg) {
        $res[$reg->{$clave}] = $reg->{$valor};
    }
    return $res;
}

/**
 * Devuelve un array asociativo con el formato clave => valor, permitiendo 
 * introducir por parámetro el primer valor del mismo con una clave nula por defecto
 * @param array $rs
 * @param string $clave
 * @param string $valor
 * @param string $default
 * @return array
 */
function dbresult_to_array_null($rs, $clave, $valor, $default = '') {
    $res = ['' => $default];
    foreach ($rs as $reg) {
        $res[$reg->{$clave}] = $reg->{$valor};
    }
    return $res;
}

/**
 * Devuelve todas las gategorías existentes
 * @return array
 */
function get_categorias() {
    $ci = get_instance();
    $ci->db->select('id_categoria, nombre');
    $query = $ci->db->get('categoria');
    return $query->result();
}

/**
 * Devuelve todas las provincias
 * @return array
 */
function get_provincias() {
    $ci = get_instance();
    $ci->db->select('cod, nombre');
    $query = $ci->db->get('provincias');
    return $query->result();
}
