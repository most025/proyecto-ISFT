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

<!doctype html>
<html lang="es">

<head>
  <title>Proyecto ISFT</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS v5.2.1 -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
</head>

<body>
  <header>
    <!-- place navbar here -->
    <nav
      class="navbar navbar-expand-sm navbar-light bg-primary">
      <a class="navbar-brand" href="#">Inicio</a>
      <button
        class="navbar-toggler d-lg-none"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId"
        aria-controls="collapsibleNavId"
        aria-expanded="false"
        aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="#" aria-current="page">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="dropdownId"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="#">Action 1</a>
              <a class="dropdown-item" href="#">Action 2</a>
            </div>
          </li>
        </ul>
        <form class="d-flex my-2 my-lg-0">
          <input
            class="form-control me-sm-2"
            type="text"
            placeholder="Search" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
      </div>
    </nav>

  </header>
  <main></main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>