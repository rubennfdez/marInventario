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
        $this->Cell(85, 10, utf8_decode("Módulo: Salida-Bodega"), 0, 0, '', 0);
        $this->Ln(10);

        /* CAMPOS DE LA TABLA */
        //color

        $this->SetFillColor(117, 116, 116); //colorFondo
        $this->SetTextColor(255, 255, 255); //colorTexto
        $this->SetDrawColor(163, 163, 163); //colorBorde
        $this->SetFont('Arial', 'B', 11);
        $this->SetX(13);
        $this->Cell(15, 10, utf8_decode('No.'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('CATEGORIA'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('PRODUCTO'), 1, 0, 'C', 1);
        $this->Cell(20, 10, utf8_decode('UM'), 1, 0, 'C', 1);
        $this->Cell(22, 10, utf8_decode('INICIAL'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('L'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('M'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('M'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('J'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('V'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('S'), 1, 0, 'C', 1);
        $this->Cell(15, 10, utf8_decode('D'), 1, 0, 'C', 1);
        $this->Cell(30, 10, utf8_decode('ACTUAL'), 1, 1, 'C', 1);
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
$consulta = "SELECT sb.idbodega_salida, c.nombre_cat, p.nombre_prod, um.uni_med, 
                    sb.inicial, sb.lunes, sb.martes, sb.miercoles, sb.jueves, 
                    sb.viernes, sb.sabado, sb.domingo, sb.actual
             FROM salida_bodega sb
             JOIN categorias c ON sb.id_categoria_sbodega = c.id_categoria
             JOIN productos p ON sb.id_producto_sbodega = p.id_producto
             JOIN unidad_medida um ON sb.id_unidadm_sbodega = um.id_medida";

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
    $pdf->SetX(13);

    $pdf->Cell(15, 10, $row['idbodega_salida'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode($row['nombre_cat']), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode($row['nombre_prod']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['uni_med']), 1, 0, 'C', 0);
    $pdf->Cell(22, 10, $row['inicial'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['lunes'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['martes'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['miercoles'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['jueves'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['viernes'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['sabado'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['domingo'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['actual'], 1, 1, 'C', 0);
}
ob_end_clean(); // Limpiar el búfer de salida
$pdf->Output('ReporteSalidaBodega.pdf', 'I'); //nombreDescarga, Visor(I->visualizar - D->descargar)
