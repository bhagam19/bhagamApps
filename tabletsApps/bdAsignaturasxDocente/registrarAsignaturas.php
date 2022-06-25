<?php
    session_name("presTablet");
	session_start();
	include('../conexion/datosConexion.php');
	$usuario=$_SESSION['usuario'];
	$usuarioID;
	$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$usuario."'");
	while($fila=mysqli_fetch_array($sql)){
		$usuarioID=$fila['usuarioID'];
	}
	
	$docenteID=$_SESSION['docenteID'];
	$asignatura=$_REQUEST['asignatura'];
	$tabla='asignaturasxDocente';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$docenteID." AND asignatura=".$asignatura);
	$contador=0;
	
	while($fila=mysqli_fetch_array($sql)){
		$contador++;
	}
	
	
	if($contador>=1){
		echo "Asignatura ya registrada.";
	}else{
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (docenteID,usuarioID,asignatura) 
		            VALUES (".$docenteID.",".$usuarioID.",'".$asignatura."')");
	}
	
	mysqli_close($conexion);
?>