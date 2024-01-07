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
        $this->Cell(85, 10, utf8_decode("TABLA: BODEGA GENERAL DE ENTRADAS Y SALIDAS"), 0, 0, '', 0);
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
        $this->Cell(15, 10, utf8_decode('ENTR'), 1, 0, 'C', 1);
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


/*$conexion = mysqli_connect("localhost", "root", "", "marbella_paraiso");
$consulta = "SELECT almacen_ebodega.id_entradab, almacen_ebodega.nombre_prod, almacen_ebodega.unidad_medida, almacen_ebodega.nombre_cat, almacen_ebodega.area,
almacen_ebodega.tipo, almacen_ebodega.entrada_bodega, almacen_ebodega.dia_ingreso, almacen_ebodega.fecha FROM almacen_ebodega ORDER BY fecha ASC";
$resultado = mysqli_query($conexion, $consulta);*/

/* Conexión a la BD (usando la conexión existente) */
require('/xampp/htdocs/marInventario/configbd2.php');

/* Consulta a la base de datos */
$consulta = "SELECT ib.idbodega_inventario, 
                ct.nombre_cat AS categoria,   -- Alias de la columna nombre_cat en la tabla categorias
                prod.nombre_prod AS producto, -- Alias de la columna nombre_prod en la tabla productos
                um.uni_med AS unidad_medida,  -- Alias de la columna uni_med en la tabla unidad_medida
                ib.entrada_bodega, ib.e_lunes, ib.s_lunes, ib.e_martes, ib.s_martes, 
                ib.e_miercoles, ib.s_miercoles, ib.e_jueves, ib.s_jueves, ib.e_viernes, ib.s_viernes,
                ib.e_sabado, ib.s_sabado, ib.e_domingo, ib.s_domingo, ib.total, ib.actual,
            DATE_FORMAT(ib.fecha, '%Y-%m-%d %H:%i:%s') AS fecha
            FROM inventario_bodega AS ib
            INNER JOIN categorias AS ct ON ib.idcategoria_bodega = ct.id_categoria
            INNER JOIN productos AS prod ON ib.idproducto_bodega = prod.id_producto
            INNER JOIN unidad_medida AS um ON ib.idum_bodega = um.id_medida";

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

    $pdf->Cell(40, 10, $row['fecha'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['categoria']), 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['producto']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, utf8_decode($row['unidad_medida']), 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['entrada_bodega'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['e_lunes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['s_lunes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['e_martes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['s_martes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['e_miercoles'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['s_miercoles'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['e_jueves'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['s_jueves'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['e_viernes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['s_viernes'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['e_sabado'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['s_sabado'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['e_domingo'], 1, 0, 'C', 0);
    $pdf->Cell(9, 10, $row['s_domingo'], 1, 0, 'C', 0);
    $pdf->Cell(18, 10, $row['total'], 1, 0, 'C', 0);
    $pdf->Cell(18, 10, $row['actual'], 1, 1, 'C', 0);
}
ob_end_clean(); // Limpiar el búfer de salida
$pdf->Output('ReporteBodegaGeneral.pdf', 'I'); //nombreDescarga, Visor(I->visualizar - D->descargar)
