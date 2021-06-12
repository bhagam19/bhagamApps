<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=principal.php'>
			</head>
		</html>";
}else{
	//Definir variable y asignar valores desde el formulario.
	$usuario=$_SESSION['usuario'];
	$contrasena=$_SESSION['contrasena']; 
	$asignatura="Inglés";
	$nombre=$_POST['nombre'];
	@$extension = end(explode(".", $_FILES["imagen"]["name"]));
	if($nombre=="" || $nombre=="Nombre"){
		$imagen=$_FILES["imagen"]["name"];
	}else{
		$imagen=$nombre.".".$extension;
	}
	echo "Nombre: ".$nombre."<br>";
	echo "Imagen: ".$imagen."<br>";
	$opcion1=$_POST['opcion1'];
	$opcion2=$_POST['opcion2'];
	$opcion3=$_POST['opcion3'];
	if($_POST['temaSelect']){
		$tema=$_POST['temaSelect'];
	}else{
		$tema=$_POST['tema'];
	}
	include('imagenSubir.php');
	include('../conexion/conectarBD2.php');
	$tabla='tipoimagen';
	$sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (usuario, contrasena, asignatura,tema,imagen,opcion1,opcion2,opcion3)
					VALUES ('$usuario','$contrasena','$asignatura','$tema','$imagen','$opcion1','$opcion2','$opcion3')");
	mysqli_close($conexion);
	echo 
	"
		<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=../tipoImagenes/verPreguntasTipoImagen.php'>
			</head>
		</html>
	";
}
?>