<?php
	session_name("presTablet");
	session_start();

	$q=$_REQUEST['q'];
	
	include('../conexion/datosConexion.php');
	$tabla='grupos';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE grupo LIKE '".$q."%' ORDER BY grupo ASC");
	$contador=0;
	$hint="";
	while($fila=mysqli_fetch_array($sql)){
		if($contador==0){
		    $hint=$fila["grupo"];
		    $contador++;
		}else{
		    $hint .= "<br>".$fila["grupo"];
		    $contador++;
		}
	}
	echo $hint;
	mysqli_close($conexion);
?>