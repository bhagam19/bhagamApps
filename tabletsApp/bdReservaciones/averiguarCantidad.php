<?php
include('../conexion/datosConexion.php');
	
$hora=$_REQUEST['hora'];
$fecha=$_REQUEST['fecha'];
$cantAntes=$_REQUEST['cant'];
$cant=0;

$tabla='reservaciones';
$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla);

while($fila=mysqli_fetch_array($consulta)){
    if($fila['fecha']==$fecha){
        $pos=strpos($fila['hora'], $hora);
        $ui=$ui." // Aquí está.";
        if($pos!==false){//Coincide la fecha y la hora.
            $cant=$cant+$fila['cantidad'];
            $ui=$ui." entro en 1";
        }else{//Coincide la fecha, pero no la hora.
            $cant=$cant;
            $ui=$ui." entro en 2";
            
        }
    }else{//No coinciden las fechas.
        $cant=$cant;
        $ui=$ui." entro en 3";
    }    
}

if($cantAntes>$cant){
    $res=$cantAntes;
}else{
    $res=$cant;
}

echo $res;

mysqli_close($conexion);

?>