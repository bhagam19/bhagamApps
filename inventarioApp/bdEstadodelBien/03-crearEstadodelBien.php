<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$estadoDelBien=$_REQUEST['estadoDelBien'];
	
	$tabla='estadoDelBien';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['nomEstado']==$estadoDelBien){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (nomEstado) VALUES ('$estadoDelBien')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>