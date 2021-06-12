<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$dependencia=$_REQUEST['dependencia'];
	$ubicacion=$_REQUEST['ubicacion'];
	$responsable=$_REQUEST['nomResponsable'];
	
	$tabla='dependencias';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['nomDependencias']==$dependencia){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (nomDependencias,codUbicacion,usuarioID) 
								VALUES ('$dependencia','$ubicacion','$responsable')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>