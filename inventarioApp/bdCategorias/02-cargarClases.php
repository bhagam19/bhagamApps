<?php

include('../conexion/datosConexion.php');

$actual=$_REQUEST['actual'];
$respuesta="";
$consulta=mysqli_query($conexion,"SELECT * FROM clasesDeBienes ORDER BY codClase");
	$clases=array();
	while($clase=mysqli_fetch_assoc($consulta)){
		$clases[$clase["codClase"]] = $clase["nomClase"];
	}	    
	foreach($clases as $idd =>$clase){ 
		if($clase!==$actual){
			$respuesta.='
				<option value="'.$idd.'">'.$clase.'</option>
			';
		}
	}	

	echo $respuesta;

mysqli_close($conexion);
?>