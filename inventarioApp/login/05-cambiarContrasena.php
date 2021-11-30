<?php
	session_name("inventarioIEE");
    session_start();
include('../conexion/datosConexion.php');
$usuario=$_SESSION['usuario'];
$actual=$_REQUEST['actual'];
$nueva=$_REQUEST['nueva'];
$tabla='usuarios';
$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$usuario."'");
while($fila=mysqli_fetch_array($sql)){
	$dbHash=$fila['contrasena'];
	$id=$fila["usuarioID"];
		if ($actual==$dbHash||crypt($actual,$dbHash) == $dbHash){	    
	    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	    $salt = strtr($salt, array('+' => '.')); 
	    $hash = crypt($nueva, '$2y$10$' . $salt);	    
	    $sql2=mysqli_query($conexion,'UPDATE '.$tabla.' SET contrasena="'.$hash.'" WHERE usuarioID='.$id);
	   echo "si";	    
	}else{
	    echo "no";
	}
}
	//Cerrar Conexion
	mysqli_close($conexion);	
?>