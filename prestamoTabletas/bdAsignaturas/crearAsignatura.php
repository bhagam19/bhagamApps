<?php
	session_name("presTablet");
	session_start();

	//Obtener variables.
	$asignatura=$_REQUEST['asignatura'];
	
	include('../conexion/datosConexion.php');
	$tabla='asignaturas';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['asignatura']==$asignatura){
			$contador++;
		}
	}
	
	if($contador==0){
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (asignatura) VALUES ('$asignatura')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>
