<?php

/**
 * Validacion de datos para poder iniciar sesion
 */
require_once ("base_marbella.php");
$usuario=$_POST['usuario'];
$clave=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","marbella_paraiso", "3306");
$consulta="SELECT*FROM usuarios where rol='$usuario' and password='$clave'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

$sql=$conexion->query(" select * from usuarios where rol='$usuario' and password='$clave' ");
if ($datos=$sql->fetch_object()){
    header('Location:inicio.php');


}else{
    
    header('location:inicio.php');
    session_destroy();
}
?>
  
  