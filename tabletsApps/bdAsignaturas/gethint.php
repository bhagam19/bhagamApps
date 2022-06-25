<?php
	session_name("presTablet");
	session_start();

	$q=$_REQUEST['q'];
	
	include('../conexion/datosConexion.php');
	$tabla='asignaturas';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE asignatura LIKE '".$q."%' ORDER BY asignatura ASC");
	$contador=0;
	$hint="";
	while($fila=mysqli_fetch_array($sql)){
		if($contador==0){
		    $hint=$fila["asignatura"];
		    $contador++;
		}else{
		    $hint .= "<br>".$fila["asignatura"];
		    $contador++;
		}
	}
	echo $hint;
	mysqli_close($conexion);
?>