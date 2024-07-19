<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo Carreras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/ActualizarCarrera.css">

</head>

<body>
    <?php
    include("../conexion.php"); //esta funcion permite incluir el archivo de conexion ('conexion.php').
    $sql = "SELECT * FROM carreras"; //variable que contiene la consulta sql
    $coman = mysqli_query($conexion, $sql);
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
            <li><b><a href="../carreras/ActualizarCarreras.php">Modificar y Eliminar Carreras</a></b></li>
            <li><b><a href="../carreras/ListadoCarreras.php">Listado de Carreras</a></b></li>
        </ul>
    </main><br>
    <div>
        <table class="table table-hover" border="1">
            <thead>
                <tr class="table-warning">

                    <th><b>Nombre de la Carrera</b></th>
                    <th><b>Abreviatura</b></th>
                    <th><b>Acciones</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($coman)) {
                    /*
                mysqli_fetch_assoc($coman): Esta función devuelve una fila de resultados como un array asociativo. 
                $coman es el resultado de la consulta a la base de datos que se realizó anteriormente.
                
                */
                ?>

                    <tr>

                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['descripcion']; ?></td>
                        <td>
                            <button><?php echo "<a href='../carreras/formActualizar.php?id=" . $filas['id'] . "'>Actualizar</a>"; ?></button>
                            <button class="btn btn-danger">
                                <a href="../proceso/procesoSuprimir.php?id=<?php echo $filas['id']; ?>" onClick="return confirm('¿Seguro de esta acción? ID <?php echo $filas['id']; ?> será eliminado y una vez eliminado no se podrá recuperar...');">
                                    Eliminar
                                </a>
                            </button>


                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
    //Esta función cierra una conexión previamente abierta a una base de datos.
    mysqli_close($conexion);
    ?>
</body>

</html>