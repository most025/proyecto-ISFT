<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/SuprimirCarrera.css">
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
        <!--Menu de navegación-->
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
        <!--tabla que lista todos los datos con sus respectivas acciones correspondiente a esta operación-->
        <table border="1">
            <thead>
                <tr>

                    <th><b>Nombre de la Carrera</b></th>
                    <th><b>Abreviatura</b></th>
                    <th><b>Acciones</b></th>
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
                        <td>
                            <button>
                                <a href="../proceso/procesoSuprimir.php?id=<?php echo $filas['id']; ?>" onClick="return confirm('¿Seguro de esta acción? ID <?php echo $filas['id']; ?> será eliminado y una vez eliminado no se podrá recuperar...');">Eliminar</a>
                            </button>
                        </td>

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