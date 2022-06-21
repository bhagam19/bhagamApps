<?php
	session_name("inventarioIET");
    session_start();
	include('../conexion/datosConexion.php');
	$usuario=$_REQUEST['usuario'];
	$actual=$_REQUEST['actual'];
	$nueva=$_REQUEST['nueva'];
	$sql=mysqli_query($conexion,"SELECT * FROM docentes WHERE usuario=".$usuario);
	while($fila=mysqli_fetch_array($sql)){
		$dbHash=$fila['contrasena'];
		if ($actual==$dbHash||crypt($actual,$dbHash) == $dbHash){
		    $salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
		    $salt = strtr($salt, array('+' => '.'));
		    $hash = crypt($nueva, '$2y$10$' . $salt);
		    // echo "<script>alert(".$hash.")</script>";
		    $sql2=mysqli_query($conexion,"UPDATE docentes SET contrasena='".$hash."' WHERE usuario=".$usuario);
		   	echo "si";	    
		}else{
		    echo "no";
		}
	}
	//Cerrar Conexion
	mysqli_close($conexion);	
?>