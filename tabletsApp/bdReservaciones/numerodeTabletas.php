<?php
    include('../conexion/datosConexion.php');
    $sql=mysqli_query($conexion,"SELECT * FROM tabletas");
    $contador=0;
    while($fila=mysqli_fetch_array($sql)){
        $contador++;
    }
    
    echo $contador;
?>