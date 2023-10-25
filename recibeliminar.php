<?php
include('configbd.php');
$id_categoria = $_REQUEST['id_categoria'];

$eliminarCat = ("DELETE FROM categorias WHERE id_categoria= '".$id_categoria."' ");
mysqli_query($con, $eliminarCat);
?>