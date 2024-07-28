<?php
include("../conexion.php");
$tipoDeLicencia = $_POST['Tlicencia'];
$descripcion = $_POST['descripcion'];

$SQL = "INSERT INTO tipos_licencias(tipodelicencia,descripcion) VALUES(?,?)";
$Preparacion = mysqli_prepare($conexion, $SQL);
if ($Preparacion == false) {
  print_r("la preparacion de consulta no ha sido exitosa " . $conexion->error);
} else {
  mysqli_stmt_bind_param($Preparacion, "ss", $tipoDeLicencia, $descripcion);

  if (mysqli_stmt_execute($Preparacion)) {
    print_r("los datos se guardaron correctamente");
    header("Location:../tipo_licencia/tipoDeLicencia_index.php");
  } else {
    print_r("Se ha producido un error al guardar los datos: " . $sentenciaPreparada->error);
  }
  mysqli_stmt_close($Preparacion);
}
mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <div class="container mt-3">
    <div class="card rounded-2 border-0">
      <h5 class="card-header bg-dark text-white">Formulario de agregar tipos de licencias</h5>
      <div class="card-body bg-light">
        <form class="form-group" action="../tipo_licencia/tipoDeLicencia_crear.php" method="post">
          <p>Tipo de licencia</p>
          <select class="form-select" name="Tlicencia" id="">
            <option value="Lic. por Embarazo">Lic. por Embarazo</option>
            <option value="Lic. por Estudio">Lic. por Estudio</option>
            <option value="Lic. por enfermedad">Lic. por enfermedad</option>
            <option value="Lic. por congreso">Lic. por congreso</option>
          </select>
          <p>descripcion</p>
          <input class="form-control" type="text" name="descripcion" id="">
          <input class="btn btn-primary float-right" type="submit" value="Enviar" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>