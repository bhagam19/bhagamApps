<?php

	include('../conexion/datosConexion.php');

	$actual=$_REQUEST['actual'];
	$tabla=$_REQUEST['tabla'];
	$campo1=$_REQUEST['campo1'];
	$campo2=$_REQUEST['campo2'];
	$respuesta="";


	if($tabla=="clasesDeBienes"){
		$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$campo2);
			$registros=array();
			while($registro=mysqli_fetch_assoc($consulta)){
				$registros[$registro["$campo1"]] = $registro["$campo2"];
			}	    
			foreach($registros as $idd =>$registro){ 
				if($registro!==$actual){
					$respuesta.='
						<option value="'.$idd.'">'.$registro.'</option>
					';
				}
			}
	}else{

		$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$campo1);
		$registros=array();
		while($registro=mysqli_fetch_assoc($consulta)){
			$registros[$registro["$campo1"]] = $registro["$campo2"];
		}	    
		foreach($registros as $idd =>$registro){ 
			if($registro!==$actual){
				$respuesta.='
					<option value="'.$idd.'">'.$registro.'</option>
				';
			}
		}
	}

	/*if($tabla=="estadoDelBien"){
			

	}else if($tabla=="usuarios"){
		$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$campo2);
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
	}*/

	echo $respuesta;

	mysqli_close($conexion);
?>