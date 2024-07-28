<?php
include("../conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $SQl = "SELECT * FROM tipos_licencias";
    $resultado = mysqli_query($conexion, $SQl);
    ?>
    <section class="content mt-3">
        <div class="row m-auto">
            <div class="col-sm">
                <div class="card rounded-2 border-0">
                    <div class="card-header bg-dark text-white pb-0">
                        <h5 class="d-inline-block">Listado de tipos de licencias</h5>
                        <a class="btn btn-primary float-right mb-2" href="carrera_crea.php">Registro de Carreras</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped table-sm" border="1">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($filas = mysqli_fetch_assoc($resultado)) {
                                ?>
                                    <tr class="col-sm">
                                        <td><?php print_r($filas['id']); ?></td>
                                        <td><?php print_r($filas['tipodelicencia']); ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-warning btn-sm"><a href="">Actualizar</a></button>
                                                <button class="btn btn-danger btn-sm"><a href="">Eliminar</a></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

</body>
<?php
mysqli_close($conexion);
?>

</html>