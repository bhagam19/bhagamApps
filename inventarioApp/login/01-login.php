<?php
	session_name("inventarioIEE");
    session_start();
include('../conexion/datosConexion.php');
$usuario=$_REQUEST['usuario'];
$contrasena=$_REQUEST['contrasena'];
$tabla='usuarios';
$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$usuario."'");
//$respuesta="";
while($fila=mysqli_fetch_array($sql)){	
	$usuarioBD=$fila['usuario'];
	$dbHash=$fila['contrasena'];
	$usuarioIDBD=$fila['usuarioID'];
	$permisoBD=$fila['permiso'];
	//$respuesta.=$contrasena.", ".$dbHash;		
	if ($contrasena==$dbHash||crypt($contrasena,$dbHash) == $dbHash){
		//$respuesta.= "Es igual ";
		$_SESSION['usuario']=$usuario;
		$_SESSION['usuarioID']=$usuarioIDBD;
		$_SESSION['permiso']=$permisoBD;
		if($dbHash=="inventApp"){
			echo "cambiar";
		}else{
			echo "si";
		}
	}else{
		//$respuesta.= "No";
		echo "no";
	}
}
	//echo $respuesta;
	//Cerrar Conexion
	mysqli_close($conexion);	
?>