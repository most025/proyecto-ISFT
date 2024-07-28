<?php
include("../conexion.php");
if (isset($_POST['Enviar'])) {
    // Aquí entra cuando se presiona el botón enviar.
    $id = $_POST['id'];
    $tipoDeLicencia = $_POST['Tlicencia'];
    $descripcion = $_POST['descripcion'];

    // Consulta SQL preparada para actualizar.
    $sql = "UPDATE tipos_licencias SET tipodelicencia=?, descripcion=? WHERE id=?";
    $sentenciaPreparada = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($sentenciaPreparada, 'ssi', $tipoDeLicencia, $descripcion, $id);

    if (mysqli_stmt_execute($sentenciaPreparada)) {
        echo "<script language='JavaScript'>
        alert('Los datos se actualizaron correctamente');
        location.assign('../tipo_licencia/tipoDeLicencia_index.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Los datos no se actualizaron correctamente');
        location.assign('../tipo_licencia/tipoDeLicencia_index.php');
        </script>";
    }

    mysqli_stmt_close($sentenciaPreparada);
    // mysqli_close($conexion);
} else {
    // Aquí entra si no se ha presionado el botón enviar.
    $id = $_GET['id'];
    $sql = "SELECT * FROM tipos_licencias WHERE id=?";
    $sentenciaPreparada = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($sentenciaPreparada, 'i', $id);
    mysqli_stmt_execute($sentenciaPreparada);

    $resultado = mysqli_stmt_get_result($sentenciaPreparada);
    $fila = mysqli_fetch_assoc($resultado);
    $NombreCarrera = $fila['tipodelicencia'];
    $AbreviaturaCarrera = $fila['descripcion'];

    mysqli_stmt_close($sentenciaPreparada);
    mysqli_close($conexion);
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container mt-3">
        <div class="card rounded-2 border-0">
            <h5 class="card-header bg-dark text-white">Formulario de editar tipo de licencia</h5>
            <b class="card-body bg-light">
                <form class="form-group" action="" method="post">

                    <p class="form-label mt-4">Tipo</p>
                    <select class="form-select" name="Tlicencia" id="">
                        <option value="Lic. por Embarazo">Lic. por Embarazo</option>
                        <option value="Lic. por Estudio">Lic. por Estudio</option>
                        <option value="Lic. por enfermedad">Lic. por enfermedad</option>
                        <option value="Lic. por congreso">Lic. por congreso</option>
                    </select>
                    <p class="form-label mt-4">descripcion</p>
                    <input class="form-control" type="text" name="descripcion" id="">
                    <input type="hidden" name="">
                    <input class="btn btn-primary" type="submit" name="Enviar" value="Guadar cambios">
                    <button class="btn btn-warning"><a href="">Volver al listado</a></button>
                </form>
            </b>
        </div>
    </div>

</body>

</html>