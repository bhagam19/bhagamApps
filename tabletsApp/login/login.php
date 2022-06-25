<?php
//session_name("presTablet");	
session_start();

include('../conexion/datosConexion.php');

$usuario=$_REQUEST['usuario'];
$contrasena=$_REQUEST['contrasena'];

$tabla='usuarios';
$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$usuario."'");

while($fila=mysqli_fetch_array($sql)){		
	$usuarioBD=$fila['usuario'];
	$dbHash=$fila['contrasena'];
	$docenteIDBD=$fila['docenteID'];
	$permisoBD=$fila['permiso'];

	if (crypt($contrasena,$dbHash) == $dbHash){
		$_SESSION['usuario']=$usuario;
		$_SESSION['docenteID']=$docenteIDBD;
		$_SESSION['permiso']=$permisoBD;
		echo "si";
	}else{
		echo "no";
	}
}
	//Cerrar Conexion
	mysqli_close($conexion);	
?>