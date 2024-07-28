<?php
include ("../conexion.php");
$tipoDeLicencia=$_POST['Tlicencia'];
$descripcion=$_POST['descripcion'];

$SQL="INSERT INTO tipos_licencias(tipodelicencia,descripcion) VALUES(?,?)";
$Preparacion=mysqli_prepare($conexion,$SQL);
if($Preparacion == false){
    print_r("la preparacion de consulta no ha sido exitosa ". $conexion->error);
}else{
    mysqli_stmt_bind_param($Preparacion,"ss",$tipoDeLicencia,$descripcion);

    if(mysqli_stmt_execute($Preparacion)){
        print_r("los datos se guardaron correctamente");
        header("Location:../tipo_licencia/tipoDeLicencia_index.php");
    }else{
        print_r ("Se ha producido un error al guardar los datos: " . $sentenciaPreparada->error);
    }
    mysqli_stmt_close($Preparacion);
}
mysqli_close($conexion);
?>
