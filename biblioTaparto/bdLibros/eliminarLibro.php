<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=../principal/principal.php'>
			</head>
		</html>";
}else{
	//Variables

	$fechaRegistro=$_GET['fechaRegistro'];
	$usuario=$_GET['usuario'];
	$codigo=$_GET['codigo'];
	$coleccion=$_GET['coleccion'];
	$titulo=$_GET['titulo'];
	$apellidoAutor=$_GET['apellidoAutor'];
	$nombreAutor=$_GET['nombreAutor'];
	$areaConocimiento=$_GET['areaConocimiento'];
	$materia=$_GET['materia'];
	$especialidad=$_GET['especialidad'];
	$paisAutor=$_GET['paisAutor'];
	$yearPublicacion=$_GET['yearPublicacion'];
	$volumen=$_GET['volumen'];
	$numPaginas=$_GET['numPaginas'];
	$cantEjemplares=$_GET['cantEjemplares'];
	$ejemplar=$_GET['ejemplar'];
	$calidad=$_GET['calidad'];

	include('../conexion/datosConexion.php');

	$tabla='libros';
	$sql=mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE fechaRegistro='".$fechaRegistro."' AND 
					usuario='".$usuario."' AND codigo='".$codigo."' AND 
					coleccion='".$coleccion."' AND titulo='".$titulo."' AND 
					apellidoAutor='".$apellidoAutor."' AND nombreAutor='".$nombreAutor."' AND
					areaConocimiento='".$areaConocimiento."' AND materia='".$materia."' AND
					especialidad='".$especialidad."' AND paisAutor='".$paisAutor."' AND
					yearPublicacion=".$yearPublicacion." AND volumen=".$volumen." AND
					numPaginas=".$numPaginas." AND cantEjemplares=".$cantEjemplares." AND
					ejemplar=".$ejemplar." AND calidad='".$calidad."'");

	mysqli_close($conexion);

	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=verBD.php'>
			</head>
		</html>";
}
?>