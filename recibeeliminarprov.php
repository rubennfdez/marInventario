<?php
include('configbd.php');
$id_proveedor = $_REQUEST['id_proveedor'];

$eliminarProveedor = ("DELETE FROM proveedores WHERE id_proveedor= '".$id_proveedor."' ");
mysqli_query($con, $eliminarProveedor);
?>