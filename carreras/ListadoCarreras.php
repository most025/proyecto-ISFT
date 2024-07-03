<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/ListadoCarreras.css">
    <title>Document</title>
</head>

<body>
    <?php
    include("../conexion.php");
    $sql = "SELECT * FROM carreras";
    $resultado = mysqli_query($conexion, $sql);
    /*
    Esta función realiza una consulta a la base de datos. 
    $conexion es un objeto que representa la conexión a una base de datos MySQL 
    y $sql es la consulta SQL que quieres ejecutar.
    */
    ?>
    <main>
        <ul>
            <li><b><a href="../index.html">Inicio</a></b></li>
            <li><b><a href="../carreras/crearCarrera.html">Crear Carrera</a></b></li>
            <li><b><a href="../carreras/SuprimirCarrera.php">Eliminar Carrera</a></b></li>
            <li><b><a href="../carreras/ActualizarCarreras.php">Modificar Carrera</a></b></li>
            <li><b><a href="../carreras/ListadoCarreras.php">Listado de Carreras</a></b></li>
        </ul>
    </main>
    <br>
    
    <div>
        <br>
    <table border="1">
        <thead id="color1">
            <tr>
                
                <th>Nombre de la carrera</th>
                <th>Abreviatura de la carrera</th>
                
            </tr>
        </thead>

        <tbody>
            <?php
            while ($filas = mysqli_fetch_assoc($resultado)) {
                /*
                mysqli_fetch_assoc($coman): Esta función devuelve una fila de resultados como un array asociativo. 
                $coman es el resultado de la consulta a la base de datos que se realizó anteriormente.
                
                */

            ?>
                <tr>
                    
                    <td><?php echo $filas['nombre'] ?></td>
                    <td><?php echo $filas['descripcion']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>



    </table>
   </div>
    <?php
    //Esta función cierra una conexión previamente abierta a una base de datos.
    mysqli_close($conexion);
    ?>
</body>

</html>