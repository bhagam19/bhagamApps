<?php
session_start();

$usuario=$_SESSION['usuario'];
$contrasena=$_SESSION['contrasena'];

include('../conexion/datosConexion.php');

$usuario=$_GET['usuario'];
$contrasena=$_GET['contrasena'];
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$edad=$_GET['edad'];

$tabla='usuarios';
$consulta=	mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE usuario='".$usuario."' AND 
			contrasena='".$contrasena."' AND nombre='".$nombre."' AND 
			apellido='".$apellido."' AND edad=".$edad);

mysqli_close($conexion);

echo 
	"<html>
		<head>
			<meta HTTP-equiv='REFRESH' content='0;url=gestionarUsuarios.php'>
		</head>
	</html>";

?>