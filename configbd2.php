<?php
/*
// Configuración de la conexión a la base de datos
$contrasena = ""; // Contraseña de la base de datos (en este caso, vacía)
$usuario = "root"; // Nombre de usuario de la base de datos
$nombre_bd = "marbella_paraiso"; // Nombre de la base de datos

try {
	// Intentar crear una nueva instancia de la clase PDO para la conexión a la base de datos
	$bd = new PDO (
		'mysql:host=localhost;dbname='.$nombre_bd, // Tipo y ubicación del servidor de la base de datos
		$usuario, // Nombre de usuario
		$contrasena, // Contraseña
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") // Configuración adicional para el conjunto de caracteres UTF-8
	);

	// La conexión se ha establecido correctamente si no ha ocurrido ninguna excepción hasta este punto
} catch (Exception $e) {
	// En caso de error durante la conexión, mostrar un mensaje de error
	echo "Problema con la conexión: ".$e->getMessage();
}*/
?>

<?php

$contrasena = "";
$usuario = "root";
$nombre_bd = "marbella_paraiso";

$conn = new mysqli("localhost", $usuario, $contrasena, $nombre_bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>


