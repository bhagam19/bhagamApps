<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="asignaturas";
	@$ordenarPor=$_REQUEST['ordenarPor'];
	@$o=$_REQUEST['o'];	
	if($ordenarPor){	
		if($o==0){
			$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$ordenarPor." ASC");
		}else{
			$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$ordenarPor." DESC");
		}										
	}else{
		$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla);				
	}

	$respuesta="";

	$respuesta.='	
					<tr>									
						<td>Nuevo:</td>
						<td><input type="text" name="asignatura" id="asignatura" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><select name="codArea" id="codArea">
							    <option>Área...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM areas ORDER BY cod");
									$areas=array();
									while($area=mysqli_fetch_assoc($consulta)){
										$areas[$area["cod"]] = $area["area"];
									}	    
									foreach($areas as $idd =>$area){ 
										$respuesta.='
											<option value="'.$idd.'">'.$area.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td class="img"><img src="../art/ok.png" style="height:30px; width:30px" title="Guardar" onclick="registrarAsignatura()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["cod"].'</td>
						<td style="text-align:left;!important" id="tdAsignatura'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputAsignatura(this.id,'.$fila1["cod"].',\'asignatura\',\'asignaturaAct'.$fila1["cod"].'\')">'.$fila1["asignatura"].'</td>';
						
						$tabla="areas";
						$campo="cod";
						$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1["codArea"]);
						while($fila=mysqli_fetch_array($consulta)){
							$area=$fila["area"];
						}	
		$respuesta.='
						<td style="text-align:left;!important" id="tdArea'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionAsignatura(this.id,'.$fila1["cod"].',\'codArea\',\'asignaturaAct'.$fila1["cod"].'\',	'.$fila1['codArea'].',\''.$tabla.'\',\''.$campo.'\')">'.$area.'</td>	
						<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionAsignaturas(6,'.$fila1["cod"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>