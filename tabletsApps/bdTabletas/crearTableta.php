<?php
	session_name("presTablet");
	session_start();

	//Obtener variables.
	$serial=$_REQUEST['serial'];
	
	include('../conexion/datosConexion.php');
	$tabla='tabletas';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['serial']==$serial){
			$contador++;
		}
	}
	
	if($contador==0){
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (serial) VALUES ('$serial')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>
