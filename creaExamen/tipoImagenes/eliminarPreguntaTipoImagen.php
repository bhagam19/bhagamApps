<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo
	'
		<html>
			<head>
				<meta HTTP-equiv="REFRESH" content="0;url=../principal/principal.php">
			</head>
		</html>
	';
}else{
	$imagen=$_GET['imagen'];
	$tema=$_GET['tema'];
	$opcion1=$_GET['opcion1'];
	$opcion2=$_GET['opcion2'];
	$opcion3=$_GET['opcion3'];
	
	include('../conexion/conectarBD2.php');
	
	$tabla='tipoImagen';
	$sql=mysql_query("DELETE FROM ".$tabla." WHERE imagen='".$imagen."' AND tema='".$tema."' AND 
						opcion1='".$opcion1."' AND opcion2='".$opcion2."' AND opcion3='".$opcion3."'");
	mysql_close($conexion);
		
	echo
	'
		<html>
			<head>
				<meta HTTP-equiv="REFRESH" content="0;url=../tipoImagenes/verPreguntasTipoImagen.php">
			</head>
		</html>
	';
}

?>