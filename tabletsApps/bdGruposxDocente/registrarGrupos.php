<?php
    session_name("presTablet");
	session_start();
	include('../conexion/datosConexion.php');
	$usuario=$_SESSION['usuario'];
	$usuarioID;
	$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$usuario."'");
	while($fila=mysqli_fetch_array($sql)){
		$usuarioID=$fila["usuarioID"];
	}
	$docenteID=$_SESSION['docenteID'];
	$grupo=$_REQUEST['grupo'];
	$tabla='gruposxDocente';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$docenteID." AND grupo=".$grupo);
	$contador=0;
	
	while($fila=mysqli_fetch_array($sql)){
		$contador++;
	}
	
	
	if($contador>=1){
		echo "Grupo ya registrado.";
	}else{
		$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (docenteID,usuarioID,grupo) 
		            VALUES (".$docenteID.",'".$usuarioID."','".$grupo."')");
	}
	
	mysqli_close($conexion);
?>