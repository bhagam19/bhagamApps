<?php

include('../conexion/datosConexion.php');

$actual=$_REQUEST['actual'];
$tabla=$_REQUEST['tabla'];
$campo2=$_REQUEST['campo2'];
$respuesta="";

if($tabla=="pemisos"){
	$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$campo2);
		$registros=array();
		while($registro=mysqli_fetch_assoc($consulta)){
			$resgistros[$registro["$campo2"]] = $registro["permisos"];
		}	    
		foreach($resgistros as $idd =>$registro){ 
			if($registro!==$actual){
				$respuesta.='
					<option value="'.$idd.'">'.$registro.'</option>
				';
			}
		}
}else{
	if($actual=="F"){
		$respuesta.='
					<option value=1>M</option>
				';
	}else{
		$respuesta.='
					<option value=0>F</option>
				';
	}
	
}


echo $respuesta;

mysqli_close($conexion);
?>