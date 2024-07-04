<?php
$servidor = "localhost";
$usuario = "root";
$clave = "291297";
$bd = "adm_escuela";
$puerto = 3307;

$conexion = mysqli_connect($servidor, $usuario, $clave, $bd, $puerto);

if ($conexion->connect_error) {
	die("Conexion fallida: " . $conexion->connect_error);
} else {
	//echo "La conexion se ha establecido";
}
?>