<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$claseBien=$_REQUEST['claseBien'];
	
	$tabla='clasesDeBienes';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['nomClase']==$claseBien){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (nomClase) VALUES ('$claseBien')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>