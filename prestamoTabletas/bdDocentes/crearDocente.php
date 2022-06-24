<?php
	session_name("presTablet");
	session_start();

	//Obtener variables.
	$apellidos=$_REQUEST['apellidos'];
	$nombres=$_REQUEST['nombres'];
	
	include('../conexion/datosConexion.php');
	$tabla='docentes';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['apellidos']==$apellidos&&$fila['nombres']==$nombres){
			$contador++;
		}
	}
	
	if($contador==0){
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (apellidos,nombres) VALUES ('$apellidos','$nombres')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>
