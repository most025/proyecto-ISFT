<?php
include("../conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/formActualizar.css">
  <title>Modulo Carreras</title>
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
<br>
  <form class="form-group" action="" method="post">
    <p>Nombre de Carrera:</p>
    <input class="form-control" type="text" name="Ncarrera" value="<?php echo $NombreCarrera; ?>" placeholder="Ingrese el nombre de la carrera" />

    <p>Abreviatura de Materia:</p>
    <input class="form-control"  type="text" name="Abrev" value="<?php echo $AbreviaturaCarrera; ?>" placeholder="Ingrese la abreviatura de la carrera" />
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <input class="btn btn-primary" type="submit" name="enviar" value="Guardar cambios" />

    <button><a href="../carreras/ActualizarCarreras.php">Volver</a></button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>