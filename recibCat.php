<?php
include('configbd.php');
$nombre_cat = $_REQUEST['nombre_cat'];
$subcat = $_REQUEST['subcategoria'];
$descripcion= $_REQUEST['descripcion'];


$QueryInsert = ("INSERT INTO categorias(
    nombre_cat,
    subcategoria,
    descripcion
)
VALUES (
    '".$nombre_cat. "',
    '".$subcat. "',
    '".$descripcion."'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:agregarcategoria.php");
?>
