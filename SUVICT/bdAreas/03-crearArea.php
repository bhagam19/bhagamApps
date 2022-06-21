<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$area=$_REQUEST['area'];
	
	$tabla='areas';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['area']==$area){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (area) VALUES ('$area')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>