<?php
include("../conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../estilos/formActualizar.css">
  <title>Document</title>
</head>

<body>
  <?php
  if (isset($_POST['enviar'])) {
    // Aquí entra cuando se presiona el botón enviar.
    $id = $_POST['id'];
    $NombreCarrera = $_POST['Ncarrera'];
    $AbreviaturaCarrera = $_POST['Abrev'];

    // Consulta SQL preparada para actualizar.
    $sql = "UPDATE carreras SET nombre=?, descripcion=? WHERE id=?";
    $sentenciaPreparada = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($sentenciaPreparada, 'ssi', $NombreCarrera, $AbreviaturaCarrera, $id);

    if (mysqli_stmt_execute($sentenciaPreparada)) {
      echo "<script language='JavaScript'>
        alert('Los datos se actualizaron correctamente');
        location.assign('../carreras/ActualizarCarreras.php');
        </script>";
    } else {
      echo "<script language='JavaScript'>
        alert('Los datos no se actualizaron correctamente');
        location.assign('../carreras/ActualizarCarreras.php');
        </script>";
    }

    mysqli_stmt_close($sentenciaPreparada);
    // mysqli_close($conexion);
  } else {
    // Aquí entra si no se ha presionado el botón enviar.
    $id = $_GET['id'];
    $sql = "SELECT * FROM carreras WHERE id=?";
    $sentenciaPreparada = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($sentenciaPreparada, 'i', $id);
    mysqli_stmt_execute($sentenciaPreparada);

    $resultado = mysqli_stmt_get_result($sentenciaPreparada);
    $fila = mysqli_fetch_assoc($resultado);
    $NombreCarrera = $fila['nombre'];
    $AbreviaturaCarrera = $fila['descripcion'];

    mysqli_stmt_close($sentenciaPreparada);
    mysqli_close($conexion);
  }
  ?>

  <form action="" method="post">
    <p>Nombre de Carrera:</p>
    <input type="text" name="Ncarrera" value="<?php echo $NombreCarrera; ?>" placeholder="Ingrese el nombre de la carrera" />

    <p>Abreviatura de Materia:</p>
    <input type="text" name="Abrev" value="<?php echo $AbreviaturaCarrera; ?>" placeholder="Ingrese la abreviatura de la carrera" />
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <input type="submit" name="enviar" value="Guardar cambios" />

    <button><a href="../carreras/ActualizarCarreras.php">Volver</a></button>
  </form>
</body>

</html>