<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
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

    public function exportar_xml_productos() {
        header("Content-type: text/xml");
        header('Content-Disposition: attachment; filename="productos.xml"');
        $productosdb = $this->Productos_model->get_productos();

        $xmlstr = <<<XML
<?xml version='1.0' encoding='UTF-8'?>
<productos></productos>
XML;

        $productos = new SimpleXMLElement($xmlstr);
        foreach ($productosdb->result() as $row) {
            $producto = $productos->addChild('producto');
            $producto->addChild('codigo', $row->codigo);
            $producto->addChild('nombre', $row->nombre);
            $producto->addChild('precio_venta', $row->precio_venta);
            $producto->addChild('descuento', $row->descuento);
            $producto->addChild('imagen', $row->imagen);
            $producto->addChild('iva', $row->iva);
            $producto->addChild('descripcion', $row->descripcion);
            $producto->addChild('anuncio', $row->anuncio);
            $producto->addChild('categoria_id', $row->categoria_id);
            $producto->addChild('destacado', $row->destacado);
            $producto->addChild('visible', $row->visible);
            $producto->addChild('fecha_inicial', $row->fecha_inicial);
            $producto->addChild('fecha_final', $row->fecha_final);
            $producto->addChild('stock', $row->stock);
        }
        echo $productos->asXML();
    }

    public function exportar_xml_categorias() {
        header("Content-type: text/xml");
        header('Content-Disposition: attachment; filename="categorias.xml"');
        $categoriasdb = $this->Productos_model->get_total_categorias();

        $xmlstr = <<<XML
<?xml version='1.0' encoding='UTF-8'?>
<categorias></categorias>
XML;

        $categorias = new SimpleXMLElement($xmlstr);
        foreach ($categoriasdb->result() as $row) {
            $categoria = $categorias->addChild('categoria');
            $categoria->addChild('codigo', $row->codigo);
            $categoria->addChild('nombre', $row->nombre);
            $categoria->addChild('descripcion', $row->descripcion);
            $categoria->addChild('anuncio', $row->anuncio);
            $categoria->addChild('visible', $row->visible);
        }
        echo $categorias->asXML();
    }

    public function importar_xml_productos() {
        $config['upload_path'] = __DIR__ . '/../../assets/xml/';
        $config['allowed_types'] = 'xml';
        $config['file_name'] = 'productos.xml';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $xml = simplexml_load_file(__DIR__ . '/../../assets/xml/' . $data['upload_data']['file_name']);
        $datos = array();
        foreach ($xml as $producto) {
            $data = array(
                'codigo' => $producto->codigo,
                'nombre' => $producto->nombre,
                'precio_venta' => $producto->precio_venta,
                'descuento' => $producto->descuento,
                'imagen' => $producto->imagen,
                'iva' => $producto->iva,
                'descripcion' => $producto->descripcion,
                'anuncio' => $producto->anuncio,
                'categoria_id' => $producto->categoria_id,
                'destacado' => $producto->destacado,
                'visible' => $producto->visible,
                'fecha_inicial' => $producto->fecha_inicial,
                'fecha_final' => $producto->fecha_final,
                'stock' => $producto->stock
            );
            array_push($datos, $data);
        }

        $this->Productos_model->insertar_producto($datos);
        redirect('Productos');
    }

    public function importar_xml_categorias() {
        $config['upload_path'] = __DIR__ . '/../../assets/xml/';
        $config['allowed_types'] = 'xml';
        $config['file_name'] = 'categorias.xml';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $xml = simplexml_load_file(__DIR__ . '/../../assets/xml/' . $data['upload_data']['file_name']);
        $datos = array();
        foreach ($xml as $categoria) {
            $data = array(
                'nombre' => $categoria->nombre,
                'codigo' => $categoria->codigo,
                'descripcion' => $categoria->descripcion,
                'anuncio' => $categoria->anuncio,
                'visible' => $categoria->visible
            );
            array_push($datos, $data);
        }

        $this->Productos_model->insertar_categoria($datos);
        redirect('Productos');
    }

    public function cargar_formulario_cat() {
        $this->load->view('importar_categorias');
    }

    public function cargar_formulario_prod() {
        $this->load->view('importar_productos');
    }

}
