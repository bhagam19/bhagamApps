<?php
include('conexion/datosConexion.php');

//====Actualizar tabla "asignaturasxDocentes": Cambiar "usuario" por "usuarioID";

mysqli_query($conexion,"ALTER TABLE asignaturasxDocente ADD usuarioID int(2) NOT NULL AFTER asignaturaID",$conexion);

$sql=mysqli_query($conexion,"SELECT * FROM asignaturasxDocente");

while($fila=mysqli_fetch_array($sql)){
    $sql2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE docenteID=".$fila['docenteID']);
    while($fila2=mysqli_fetch_array($sql2)){
        mysqli_query($conexion,"UPDATE asignaturasxDocente SET usuarioID=".$fila2['usuarioID']." WHERE docenteID=".$fila['docenteID'],$conexion);
    }
}
mysqli_query($conexion,"ALTER TABLE asignaturasxDocente DROP usuario",$conexion);

//====Actualizar tabla "gruposxDocente": Cambiar "usuario" por "usuarioID";

mysqli_query($conexion,"ALTER TABLE gruposxDocente ADD usuarioID int(2) NOT NULL AFTER grupoID",$conexion);

$sql=mysqli_query($conexion,"SELECT * FROM gruposxDocente");
while($fila=mysqli_fetch_array($sql)){
    $sql2=mysqli_query($conexion,"SELECT * FROM usuarios WHERE docenteID=".$fila['docenteID']);
    while($fila2=mysqli_fetch_array($sql2)){
        mysqli_query($conexion,"UPDATE gruposxDocente SET usuarioID=".$fila2['usuarioID']." WHERE docenteID=".$fila['docenteID'],$conexion);
    }
}
mysqli_query($conexion,"ALTER TABLE gruposxDocente DROP usuario");

//====Actualizar tabla "reservaciones": Cambiar "docente" por "docenteID";

mysqli_query($conexion,"ALTER TABLE reservaciones ADD docenteID int(2) NOT NULL AFTER reservacionID",$conexion);

$sql=mysqli_query($conexion,"SELECT * FROM reservaciones");
while($fila=mysqli_fetch_array($sql)){
    
    echo'<scrip>alert("'.$fila['docente'].'");</script>';
    
    $nombre;
    $nombres=explode(" ",$fila['docente']);
    
    for($i=0;$i <= 1;$i++){
        if($i==0){
            $nombre=$nombres[$i]." ";
        }else{
            $nombre .= $nombres[$i];
        }
    }
    echo'<scrip>alert("'.$nombre.'");</script>';
    
    
    $sql2=mysqli_query($conexion,"SELECT * FROM docentes WHERE nombres='".$nombre."'");
    while($fila2=mysqli_fetch_array($sql2)){
        mysqli_query($conexion,"UPDATE reservaciones SET docenteID=".$fila2['docenteID']." WHERE docente='".$fila['docente']."'",$conexion);
    }
}
mysqli_query($conexion,"ALTER TABLE reservaciones DROP docente");


?>