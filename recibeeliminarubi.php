<?php
include('configbd.php');
$id_ubicacion = $_REQUEST['id_ubicacion'];

$eliminarUbicacion = ("DELETE FROM ubicacion WHERE id_ubicacion= '".$id_ubicacion."' ");
mysqli_query($con, $eliminarUbicacion);
?>