<?php
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	$tabla='usuarios';
	$condicion ='dane='.$usuario;
	require('../../03-cnt/index.php');
    $dato=new modeloController();
    $respuesta=$dato->validarLogin($tabla,$condicion,$contrasena);
	echo $respuesta;

	include('../appsConexion/datosConexion.php');
	$usuario=$_SESSION['usuario'];
	$actual=$_REQUEST['actual'];
	$nueva=$_REQUEST['nueva'];
	$tabla='usuarios';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$usuario."'");
	while($fila=mysqli_fetch_array($sql)){
		$dbHash=$fila['contrasena'];//Traemos la contraseña encriptada desde la BD
		$id=$fila["usuarioID"];		
		if ($actual==$dbHash||crypt($actual,$dbHash) == $dbHash){//Comparamos la contraseña ingresada con la actual sin encriptar o ya encriptada.			
			$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
			$salt = strtr($salt, array('+' => '.')); 
			$hash = crypt($nueva, '$2y$10$' . $salt);//Encriptamos la nueva contraseña			
			$sql2=mysqli_query($conexion,'UPDATE '.$tabla.' SET contrasena="'.$hash.'" WHERE usuarioID='.$id);
		echo "si";			
		}else{
			echo "no";
		}
	}	
	mysqli_close($conexion);//Cerrar Conexion
?>