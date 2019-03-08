<?php

class Pdf_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

}

class Pagina_PDF extends Fpdf\Fpdf {

    public function header() {
        // Logo
        $this->Image(base_url() . 'assets/img/home/logo.png', 88.5, 11, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        //$this->Cell(80);
        // Título
        //$this->Cell(30, 10, 'R-Shop', 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }
    
    public function datos_pedido($datosusuario) {
        $this->SetFont('Arial', '', 15);
        $this->Cell(100);
        $this->Cell(0, 8, utf8_decode($datosusuario->nombre . ' ' . $datosusuario->apellidos), 0, 1);
        $this->Cell(100);
        $this->Cell(0, 8, utf8_decode($datosusuario->dni), 0, 1);
        $this->Cell(100);
        $this->Cell(0, 8, utf8_decode($datosusuario->direccion), 0, 1);
        $this->Cell(100);
        $this->Cell(0, 8, utf8_decode($datosusuario->email), 0, 1);
        $this->Cell(100);
        $this->Cell(0, 8, utf8_decode($datosusuario->codigo_postal . ', ' . SQLToProvincia($datosusuario->provincia)), 0, 1);
        $this->Cell(100);
        $this->Ln(10);
    }
    
    
    // Una tabla más completa
    public function Albaran($header, $data) {
        // Anchuras de las columnas
        $w = array(40, 40, 40);
        $this->Cell(30, 7, '', 0);
        // Cabeceras
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        // Datos
        $total = 0;
        foreach ($data as $row) {
            $total += $row->precio;
            $this->Cell(30, 7, '', 0);
            $this->Cell($w[0], 6, $row->producto_id, 'LR', 0, 'R');
            $this->Cell($w[1], 6, $row->cantidad, 'LR', 0, 'R');
            $this->Cell($w[2], 6, $row->precio, 'LR', 0, 'R');
            $this->Ln();
        }
        // Línea de cierre
        $this->Cell(30, 7, '', 0);
        $this->Cell(array_sum($w), 0, '', 'T');
        $this->Cell(0, 10, utf8_decode('IVA: 21%'), 0, 1);
        $this->Cell(0, 10, utf8_decode('Total: ' . number_format($total * 1.21, 2)), 0, 1);
    }

    // Pie de página
    public function footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-20);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 10);
        // Contenido
        $this->Cell(0, 5, utf8_decode('C/ Juan Ramón Jiménez 19'), 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 10, utf8_decode('21510 San Bartolomé de la Torre, Huelva'), 0, 0, 'C');
    }

}
