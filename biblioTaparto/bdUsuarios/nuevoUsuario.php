<html>
	<head>
		<script type="text/javascript" src="javascripts.js"></script>		
	</head>

<?php

$contador=0;

//Obtener variables.
@$permisos=$_POST['permisos'];
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$edad=$_POST['edad'];

//Comprobar si existe el usuario en Base de Datos
include('../conexion/datosConexion.php');

$tabla='usuarios';
$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);

while($fila=mysqli_fetch_array($sql)){
	if($fila['usuario']==$usuario){
		$contador++;
	}
}

//Crear un nuevo usuario
if($contador==0){
	
	if($permisos==""){
		$permisos=3;
	}
			
	include('..conexion/datosConexion.php');
	$tabla='usuarios';
	$sql=mysqli_query($conexion,"
		INSERT INTO ".$tabla." (usuario, contrasena, nombre, apellido, edad, permisos)
		VALUES ('$usuario','$contrasena','$nombre','$apellido',$edad,$permisos)");

	//Cerrar
	mysqli_close($conexion);

	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=gestionarUsuarios.php'>
			</head>
		</html>";
		
	echo "<script> 
			var nombreUsuario='".$nombre."'+' '+'".$apellido."';
			alert(nombreUsuario +' Bienvenid@.');
			cerrarVentana();
			
						
		</script>";	
	
}else{
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=formularioaltausuario.php'>
			</head>
		</html>";
	echo "<script> alert('El usuario ya existe.');</script>";
}	
?>
</html>