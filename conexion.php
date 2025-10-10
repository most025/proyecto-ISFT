<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "abm_escuela";

$conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
// conexion a la base de datos
if ($conexion->connect_error) {
	die("Conexion fallida: " . $conexion->connect_error);
} else {
	//echo "La conexion se ha establecido";
}
?>