<?php

include('../conexion/datosConexion.php');

$actual=$_REQUEST['actual'];
$tabla=$_REQUEST['tabla'];
$campo2=$_REQUEST['campo2'];
$respuesta="";


if($tabla=="docentes"){
	$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY apellidos");
	$registros=array();
	
	while($registro=mysqli_fetch_assoc($consulta)){
		$resgistros[$registro["$campo2"]] = $registro["apellidos"]." ".$registro["nombres"];
		}	
		    
	foreach($resgistros as $idd =>$registro){ 
		if($registro!==$actual){
			$respuesta.='
				<option value="'.$idd.'">'.$registro.'</option>
			';
		}
	}

}else{
	$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$campo2);
	$registros=array();

	if($tabla=="asignaturas"){
		while($registro=mysqli_fetch_assoc($consulta)){
		$resgistros[$registro["$campo2"]] = $registro["asignatura"];
		}		
	}else{
		while($registro=mysqli_fetch_assoc($consulta)){
		$resgistros[$registro["$campo2"]] = $registro["grupo"];
		}
	}
		    
	foreach($resgistros as $idd =>$registro){ 
		if($registro!==$actual){
			$respuesta.='
				<option value="'.$idd.'">'.$registro.'</option>
			';
		}
	}

}




echo $respuesta;

mysqli_close($conexion);
?>