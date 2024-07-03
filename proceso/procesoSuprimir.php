<?php
require_once('../conexion.php');
$msg = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta preparada para eliminar un registro
    $query = "DELETE FROM carreras WHERE id = ?";

    // Preparación de la consulta
    if ($sentenciaPreparada = mysqli_prepare($conexion, $query)) {
        // Vinculación del parámetro
        mysqli_stmt_bind_param($sentenciaPreparada, "i", $id);

        // Ejecución de la consulta
        if (mysqli_stmt_execute($sentenciaPreparada)) {
            $msg = 'La eliminación del registro ha sido exitosa';
            header('Location: ../carreras/SuprimirCarrera.php');
        } else {
            $msg = 'Ocurrió un error durante la eliminación';
        }

        // Cierre de la sentencia preparada
        mysqli_stmt_close($sentenciaPreparada);
    } else {
        $msg = 'Error al preparar la consulta';
    }
}

mysqli_close($conexion);
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <span><?php echo $msg; ?></span>
</body>

</html>