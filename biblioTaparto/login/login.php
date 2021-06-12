<?php
session_start();

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

include('../conexion/datosConexion.php');

$tabla='usuarios';
$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);

while($fila=mysqli_fetch_array($sql)){
	$usuarioBD=$fila['usuario'];
	$contrasenaBD=$fila['contrasena'];
	$nombreBD=$fila['nombre'];
	$apellidoBD=$fila['apellido'];
	$permisosBD=$fila['permisos'];
	
	if($usuario==$usuarioBD & $contrasena==$contrasenaBD){
		$_SESSION['usuario']=$usuario;
		$_SESSION['contrasena']=$contrasena;
		$_SESSION['nombre']=$nombreBD;
		$_SESSION['apellido']=$apellidoBD;
		$_SESSION['permisos']=$permisosBD;
				
	}
}

	//Cerrar Conexion
	mysqli_close($conexion);

	
	echo 
			"<html>
				<head>
					<meta HTTP-equiv='REFRESH' content='0;url=../principal/principal.php'>
				</head>
			</html>";
	
?>
