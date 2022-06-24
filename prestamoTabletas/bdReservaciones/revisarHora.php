<?php
include('../conexion/datosConexion.php');
	
$hora=$_REQUEST['hora'];
$fecha=$_REQUEST['fecha'];
$disponiblesAntes=$_REQUEST['disponibles'];
$disponibles=0;

$tabla='reservaciones';
$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla);

while($fila=mysqli_fetch_array($consulta)){
    if($fila['fecha']==$fecha){
        $pos=strpos($fila['hora'], $hora);
        if($pos!==false){
            if($disponibles==""){
                $disponibles=50-$fila['cantidad'];
            }else{
                if($disponibles>(50-$fila['cantidad'])){
                    $disponibles=50-$fila['cantidad'];
                }else{
                    $disponibles=$disponibles;
                }
            }
        }else{
            if($disponibles==""){
                $disponibles=50;
            }else{
                $disponibles=$disponibles;
            }
        }
    }else{
        $disponibles=50;
    }    
}

echo $disponibles;

mysqli_close($conexion);

?>