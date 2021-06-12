<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$permiso=$_REQUEST['permiso'];
	
	$tabla='permisos';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['permisos']==$permiso){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (permisos) VALUES ('$permiso')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>