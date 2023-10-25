<?php
include('configbd.php');
$id_categoria = $_REQUEST['id_categoria'];
$nombre_cat = $_REQUEST['nombre_cat'];
$subcategoria = $_REQUEST['subcategoria'];
$descripcion= $_REQUEST['descripcion'];

$update = "UPDATE categorias 
        SET nombre_cat ='".$nombre_cat."', 
        subcategoria ='".$subcategoria. "',
	    descripcion ='".$descripcion. "'

WHERE id_categoria='".$id_categoria. "'";
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='agregarcategoria.php';
    </script>";

?>
