<?php
	session_name("presTablet");
	session_start();

	//Obtener variables.
	$grupo=$_REQUEST['grupo'];
	
	include('../conexion/datosConexion.php');
	$tabla='grupos';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['grupo']==$grupo){
			$contador++;
		}
	}
	
	if($contador==0){
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (grupo) VALUES ('$grupo')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>
