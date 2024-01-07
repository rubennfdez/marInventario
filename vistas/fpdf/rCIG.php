<?php

require('./fpdf.php');
class PDF extends FPDF
{

    // Cabecera de página
    function Header()
    {

        $this->Image('marlogo1.png', 10, 5, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG

        $this->SetFont('Arial', 'B', 25); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(95); // Movernos a la derecha
        $this->SetTextColor(0, 0, 0); //color
        //creamos una celda o fila
        $this->Cell(110, 15, utf8_decode('REPORTE INVENTARIO'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
        $this->Ln(3); // Salto de línea
        $this->SetTextColor(103); //color

        /* NOMBRE EMPRESA */
        $this->Cell(20);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("RESTAURANT CARNES Y MARISCOS MARBELLA "), 0, 0, '', 0);
        $this->Ln(5);

        /* UBICACION */
        $this->Cell(20);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("Ubicación: Carretera Chiltepec SN, Paraíso, Mexico, 86611"), 0, 0, '', 0);
        $this->Ln(5);

        /* TELEFONO */
        $this->Cell(20);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("Teléfono:  993 169 7752"), 0, 0, '', 0);
        $this->Ln(5);


        /* CORREO */
        $this->Cell(20);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Correo: banquetesmely@gmail.com "), 0, 0, '', 0);
        $this->Ln(5);

        /* SUCURSAL */
        $this->Cell(20);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Sucursal: Paraiso, Tabasco "), 0, 0, '', 0);
        $this->Ln(5);

        /* MODULO SISTEMA */
        $this->Cell(20);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("TABLA: COCINA GENERAL DE ENTRADAS Y SALIDAS"), 0, 0, '', 0);
        $this->Ln(10);

        /* CAMPOS DE LA TABLA */
        //color

        $this->SetFillColor(255,255,255); //colorFondo
        $this->SetTextColor(117, 116, 116); //colorTexto
        $this->SetDrawColor(163, 163, 163); //colorBorde
        $this->SetFont('Arial', 'B', 11);
        $this->SetX(3);
        $this->Cell(40, 10, utf8_decode(''), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode(''), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode(''), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode(''), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode(''), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('Lunes'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('Martes'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('Miércoles'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('Jueves'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('Viernes'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('Sábado'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('Domingo'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode(''), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode(''), 1, 1, 'C', 1);

        /* CAMPOS DE LA TABLA */
        //color

        $this->SetFillColor(117, 116, 116); //colorFondo
        $this->SetTextColor(255, 255, 255); //colorTexto
        $this->SetDrawColor(163, 163, 163); //colorBorde
        $this->SetFont('Arial', 'B', 11);
        $this->SetX(3);
        $this->Cell(40, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('CATEGORIA'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('PRODUCTO'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('UM'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('INIC'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('E'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('E'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('E'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('E'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('E'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('E'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('E'), 1, 0, 'C', 1);
        $this->Cell(9, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('TOTAL'), 1, 0, 'C', 1);
        $this->Cell(18, 10, utf8_decode('ACTUAL'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
        $hoy = date('d/m/Y');
        $this->Cell(540, 10, utf8_decode("Fecha:" . $hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
    }
}

$pdf = new PDF();
/* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

/* Conexión a la BD (usando la conexión existente) */
require('/xampp/htdocs/marInventario/configbd2.php');

/* Consulta a la base de datos */
$consulta = "SELECT ic.idcocina_inventario, 
                ct.nombre_cat AS categoria,   -- Alias de la columna nombre_cat en la tabla categorias
                prod.nombre_prod AS producto, -- Alias de la columna nombre_prod en la tabla productos
                um.uni_med AS unidad_medida,  -- Alias de la columna uni_med en la tabla unidad_medida
                ic.inicial_cocina, ic.ec_lunes, ic.sc_lunes, ic.ec_martes, ic.sc_martes, 
                ic.ec_miercoles, ic.sc_miercoles, ic.ec_jueves, ic.sc_jueves, ic.ec_viernes, ic.sc_viernes,
                ic.ec_sabado, ic.sc_sabado, ic.ec_domingo, ic.sc_domingo, ic.total_cocina, ic.actual_cocina,
            DATE_FORMAT(ic.fecha_cocina, '%Y-%m-%d %H:%i:%s') AS fecha_cocina
            FROM inventario_cocina AS ic
            INNER JOIN categorias AS ct ON ic.idcategoria_cocina = ct.id_categoria
            INNER JOIN productos AS prod ON ic.idproducto_cocina = prod.id_producto
            INNER JOIN unidad_medida AS um ON ic.idum_cocina = um.id_medida";

$resultado = $conn->query($consulta);

if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}

echo "Consulta SQL: " . $consulta . "<br>";


$pdf->AliasNbPages();
$pdf->AddPage("landscape");
$pdf->SetFont('Arial', '', 10);

//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(3);

    $pdf->Cell(40, 10, $row['fecha_cocina'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['categoria']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['producto']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, utf8_decode($row['unidad_medida']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['inicial_cocina'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['ec_lunes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['sc_lunes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['ec_martes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['sc_martes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['ec_miercoles'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['sc_miercoles'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['ec_jueves'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['sc_jueves'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['ec_viernes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['sc_viernes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['ec_sabado'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['sc_sabado'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['ec_domingo'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['sc_domingo'], 1, 0, 'C', 0);
    $pdf->Cell(18, 10, $row['total_cocina'], 1, 0, 'C', 0);
    $pdf->Cell(18, 10, $row['actual_cocina'], 1, 1, 'C', 0);
}
ob_end_clean(); // Limpiar el búfer de salida
$pdf->Output('ReporteCocinaGeneral.pdf', 'I'); //nombreDescarga, Visor(I->visualizar - D->descargar)
