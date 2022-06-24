<?php
    session_name("presTablet");
	session_start();
	include('../conexion/datosConexion.php');
	
	$docenteID=$_REQUEST["docenteID"];
	$asignatura=$_REQUEST['asignatura'];
	$usuarioID;
	
	$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE docenteID=".$docenteID);
	while($fila=mysqli_fetch_array($sql)){
		$usuarioID=$fila["usuarioID"];
	}
	
	$tabla='asignaturasxDocente';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$docenteID." AND asignatura=".$asignatura);
	$contador=0;
	
	while($fila=mysqli_fetch_array($sql)){
		$contador++;
	}
	
	if($contador>=1){
		echo "Asignatura ya registrada.";
	}else{
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (docenteID,usuarioID,asignatura) 
		            VALUES (".$docenteID.",'".$usuarioID."','".$asignatura."')");
	}
	
	mysqli_close($conexion);
?>