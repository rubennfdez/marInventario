<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "marbella_paraiso";

try{
    $conexion = new PDO ("mysql: host=$host; dbname=$database", $user, $password);
   

} catch (Exception $e) {
    echo $e->getMessage();
}


?>