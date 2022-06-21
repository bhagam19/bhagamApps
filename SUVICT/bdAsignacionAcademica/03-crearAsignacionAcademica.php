<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$docente=$_REQUEST['docente'];
	$asignatura=$_REQUEST['asignatura'];
	$grupo=$_REQUEST['grupo'];
	
	$tabla='asignacionAcademica';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	$registro;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['docente']==$docente&&$fila['asignatura']==$asignatura&&$fila['grupo']==$grupo){
			$contador++;
			$registro=$fila['cod'];
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (docente, asignatura, grupo) 
		VALUES ('$docente','$asignatura','$grupo')");
		echo "si";
	}else{	
		echo $registro;
	}
	mysqli_close($conexion);
?>