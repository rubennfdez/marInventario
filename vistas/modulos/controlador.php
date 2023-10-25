<?php
if (!empty($_POST["btningresar"])){
    if (empty($_POST["usuario"])and empty($_POST["pass"])){
        echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';

    } else {
        $usuario=$_POST["usuario"];
        $clave=$_POST["pass"];
        $sql=$conexion->query(" select * from usuarios where rol='$usuario' and pass='$clave' ");
        if ($datos=$sql->fetch_object()){
            header("location:inicio.php");
        }else{
            echo '<div class="alert alert-danger">Usuario y/o Contraseña incorrectos</div>';
            
        }

    }
}
?>