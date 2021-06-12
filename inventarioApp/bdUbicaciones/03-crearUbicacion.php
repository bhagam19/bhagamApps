<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$ubicacion=$_REQUEST['ubicacion'];
	
	$tabla='ubicaciones';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['nomUbicacion']==$ubicacion){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (nomUbicacion) VALUES ('$ubicacion')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>