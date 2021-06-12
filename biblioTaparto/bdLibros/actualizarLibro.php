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
	$coleccion=$_POST['coleccion'];
	$titulo=$_POST['titulo'];
	$apellidoAutor=$_POST['apellidoAutor'];
	$nombreAutor=$_POST['nombreAutor'];
	$areaConocimiento=$_POST['areaConocimiento'];
	$materia=$_POST['materia'];
	@$especialidad=$_POST['especialidad'];
	$paisAutor=$_POST['paisAutor'];
	$yearPublicacion=$_POST['yearPublicacion'];
	$volumen=$_POST['volumen'];
	$numPaginas=$_POST['numPaginas'];
	$cantEjemplares=$_POST['cantEjemplares'];
	$ejemplar=$_POST['ejemplar'];
	$calidad=$_POST['calidad'];

	$tituloAnterior=$_SESSION['titulo'];
	
	include('codigoCrear.php');
	include('../conexion/datosConexion.php');

	$tabla='libros';
	$sql=mysqli_query($conexion,"UPDATE ".$tabla." SET codigo='".$codigo."', coleccion='".$coleccion."', titulo='".$titulo."', 
					apellidoAutor='".$apellidoAutor."', nombreAutor='".$nombreAutor."',
					areaConocimiento='".$areaConocimiento."', materia='".$materia."',
					especialidad='".$especialidad."', paisAutor='".$paisAutor."',
					yearPublicacion=".$yearPublicacion.", volumen=".$volumen.",
					numPaginas=".$numPaginas.", cantEjemplares=".$cantEjemplares.",
					ejemplar=".$ejemplar.", calidad='".$calidad."' WHERE titulo='".$tituloAnterior."'");
					
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=verBD.php'>
			</head>
		</html>";
					
	mysqli_close($conexion);		
}
				
?>