<?php
	session_name("CTEApp");
    session_start();

include('../conexion/datosConexion.php');

$usuario=$_REQUEST['usuario'];
$contrasena=$_REQUEST['contrasena'];

$tabla='docentes';
$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$usuario."'");

while($fila=mysqli_fetch_array($sql)){
	$usuarioBD=$fila['usuario'];
	$dbHash=$fila['contrasena'];
	$codBD=$fila['cod'];
	$permisoBD=$fila['permiso'];
	
	if ($contrasena==$dbHash||crypt($contrasena,$dbHash) == $dbHash){
		$_SESSION['usuario']=$usuario;
		$_SESSION['cod']=$codBD;
		$_SESSION['permiso']=$permisoBD;
		

		if($dbHash=="cetApp"){
			echo "cambiar";
		}else{
			echo "si";
		}

	}else{
		echo "no";
	}
}
	//Cerrar Conexion
	mysqli_close($conexion);
	
?>