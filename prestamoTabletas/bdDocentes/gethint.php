<?php
	session_name("presTablet");
	session_start();

	$q=$_REQUEST['q'];
	
	include('../conexion/datosConexion.php');
	$tabla='docentes';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE apellidos LIKE '".$q."%' ORDER BY apellidos ASC");
	$contador=0;
	$hint="";
	while($fila=mysqli_fetch_array($sql)){
		if($contador==0){
		    $hint=$fila["apellidos"]." ".$fila["nombres"];
		    $contador++;
		}else{
		    $hint .= "<br>".$fila["apellidos"]." ".$fila["nombres"];
		    $contador++;
		}
	}
	echo $hint;
	mysqli_close($conexion);
?>