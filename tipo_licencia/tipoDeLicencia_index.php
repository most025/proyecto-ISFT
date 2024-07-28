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
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Aciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($filas = mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <td><?php print_r($filas['id']);?></td>
                    <td><?php print_r($filas['tipodelicencia']);?></td>
                    <td>
                        <button><a href="">Eliminar</a></button>
                        <button><a href="">Actualizar</a></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>

</body>
<?php
mysqli_close($conexion);
?>
</html>