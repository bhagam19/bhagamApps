<?php

session_start();

//Recupero variables


$permisos=$_POST['permisos'];
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];

$usuarioAntiguo=$usuario;

include('../conexion/datosConexion.php');

$tabla='usuarios';
$sql=mysqli_query($conexion,"UPDATE ".$tabla." SET permisos='".$permisos."', usuario='".$usuario."', contrasena='".$contrasena."',
		nombre='".$nombre."', apellido='".$apellido."', 
		edad=".$edad." WHERE usuario='".$usuarioAntiguo."'");

echo 
	"<html>
		<head>
			<meta HTTP-equiv='REFRESH' content='0;url=gestionarUsuarios.php'>
		</head>
	</html>";

//Cerrar conexion;
mysqli_close($conexion);

?>