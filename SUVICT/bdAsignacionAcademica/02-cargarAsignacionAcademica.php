<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="asignacionAcademica";
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
						<td><select name="docente" id="docente">
							    <option>Docente...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM docentes ORDER BY apellidos");
									$docentes=array();
									while($fila=mysqli_fetch_assoc($consulta)){
										$docentes[$fila["cod"]] = $fila["apellidos"]." ".$fila["nombres"]." ";
									}	    
									foreach($docentes as $idd =>$docente){ 
										$respuesta.='
											<option value="'.$idd.'">'.$docente.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td><select name="asignatura" id="asignatura">
							    <option>Asignatura...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM asignaturas ORDER BY cod");
									$asignaturas=array();
									while($fila=mysqli_fetch_assoc($consulta)){
										$asignaturas[$fila["cod"]] = $fila["asignatura"];
									}	    
									foreach($asignaturas as $idd =>$asignatura){ 
										$respuesta.='
											<option value="'.$idd.'">'.$asignatura.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td><select name="grupo" id="grupo">
							    <option>Grupo...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY cod");
									$grupos=array();
									while($fila=mysqli_fetch_assoc($consulta)){
										$grupos[$fila["cod"]] = $fila["grupo"];
									}	    
									foreach($grupos as $idd =>$grupo){ 
										$respuesta.='
											<option value="'.$idd.'">'.$grupo.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td class="img"><img src="../art/ok.png" style="height:30px; width:30px" title="Guardar" onclick="registrarAsignacionAcademica()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>
						<td style="text-align:center">'.$fila1["cod"].'</td>';

						$tabla="docentes";
						$campo="cod";
						$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1["docente"]);
						while($fila=mysqli_fetch_array($consulta)){
							$docente=$fila["apellidos"]." ".$fila["nombres"];
						}									
		$respuesta.=
			'						
						<td style="text-align:left;!important" id="tdDocente'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionAsignacionAcademica(this.id,'.$fila1["cod"].',\'docente\',\'docenteAct'.$fila1["cod"].'\','.$fila1['cod'].',\''.$tabla.'\',\''.$campo.'\')">'.$docente.'</td>';

						$tabla="asignaturas";
						$campo="cod";
						$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1["asignatura"]);
						while($fila=mysqli_fetch_array($consulta)){
							$asignatura=$fila["asignatura"];
						}	
		$respuesta.='
						<td style="text-align:left;!important" id="tdAsignatura'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionAsignacionAcademica(this.id,'.$fila1["cod"].',\'asignatura\',\'asignaturaAct'.$fila1["cod"].'\','.$fila1['cod'].',\''.$tabla.'\',\''.$campo.'\')">'.$asignatura.'</td>';

						$tabla="grupos";
						$campo="cod";
						$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1["grupo"]);
						while($fila=mysqli_fetch_array($consulta)){
							$grupo=$fila["grupo"];
						}	
		$respuesta.='
						<td style="text-align:left;!important" id="tdGrupo'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionAsignacionAcademica(this.id,'.$fila1["cod"].',\'grupo\',\'grupoAct'.$fila1["cod"].'\','.$fila1['cod'].',\''.$tabla.'\',\''.$campo.'\')">'.$grupo.'</td>
						
						<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionAsignacionAcademica(6,'.$fila1["cod"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>