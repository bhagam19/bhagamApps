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
	//Definir variable y asignar valores desde el formulario.
	$fecha=date('Y')."-".date('m')."-".date('d');
	$usuario=$_SESSION['usuario'];
	$imagen=$_FILES['imagen']['name'];
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
	$calidad=$_POST['calidad'];
	$ejemplar=$_POST['ejemplar'];

	include('portadaSubir.php');
	
	include('codigoCrear.php');
	
	include('../conexion/datosConexion.php');
	$tabla='libros';
	$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (imagen, codigo, fechaRegistro,usuario,coleccion,titulo,apellidoAutor,nombreAutor,areaConocimiento,materia,especialidad,paisAutor,yearPublicacion,volumen,numPaginas,cantEjemplares,calidad,ejemplar)
					VALUES ('$imagen','$codigo','$fecha','$usuario','$coleccion','$titulo','$apellidoAutor','$nombreAutor','$areaConocimiento','$materia','$especialidad','$paisAutor',$yearPublicacion,$volumen,$numPaginas,$cantEjemplares,'$calidad',$ejemplar) ");
	mysqli_close($conexion);
	echo 
				"<html>
					<head>
						<meta HTTP-equiv='REFRESH' content='0;url=verBD.php'>
					</head>
				</html>";
}
?>