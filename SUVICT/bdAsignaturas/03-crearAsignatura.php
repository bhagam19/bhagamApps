<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$asignatura=$_REQUEST['asignatura'];
	$codArea=$_REQUEST['codArea'];
	
	$tabla='asignaturas';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['asignatura']==$asignatura){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (asignatura,codArea) VALUES ('$asignatura','$codArea')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>