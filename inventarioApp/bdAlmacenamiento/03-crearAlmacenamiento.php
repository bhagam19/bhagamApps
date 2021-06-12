<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$almacenamiento=$_REQUEST['almacenamiento'];
	
	$tabla='almacenamiento';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['nomAlmacenamiento']==$almacenamiento){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (nomAlmacenamiento) VALUES ('$almacenamiento')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>