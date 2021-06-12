<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="estudiantes";
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
						<td><input type="text" name="id" id="id" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><input type="text" name="apellidos" id="apellidos" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><input type="text" name="nombres" id="nombres" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><select name="genero" id="genero">
							    <option>Genero...</option> 
								<option value=0>F</option>
								<option value=1>M</option>										
							</select></td>
						<td><select name="sede" id="sede">
							    <option>Sede...</option> 
								<option value=1>Sede Julio Jiménez</option>	
								<option value=2>Sede La Lejía</option>	
								<option value=3>Sede La Melliza</option>	
								<option value=4>Sede Monteverde</option>	
								<option value=5>Sede Ricardo González</option>
								<option value=6>Sede Principal</option>																	
							</select></td>
						<td><select name="grupo" id="grupo">
							    <option>Grupo...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY cod");
									$grupos=array();
									while($grupo=mysqli_fetch_assoc($consulta)){
										$grupos[$grupo["cod"]] = $grupo["grupo"];
									}	    
									foreach($grupos as $idd =>$grupo){ 
										$respuesta.='
											<option value="'.$idd.'">'.$grupo.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td class="img"><img src="../art/ok.png" style="height:30px; width:30px" title="Guardar" onclick="registrarEstudiante()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["cod"].'</td>
						<td style="text-align:left;!important" id="tdID'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputEstudiante(this.id,'.$fila1["cod"].',\'ID\',\'IDAct'.$fila1["cod"].'\')">'.$fila1["ID"].'</td>
						<td style="text-align:left;!important" id="tdApellidos'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputEstudiante(this.id,'.$fila1["cod"].',\'apellidos\',\'apellidosAct'.$fila1["cod"].'\')">'.$fila1["apellidos"].'</td>
						<td style="text-align:left;!important" id="tdNombres'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputEstudiante(this.id,'.$fila1["cod"].',\'nombres\',\'nombreAct'.$fila1["cod"].'\')">'.$fila1["nombres"].'</td>';
						if($fila1["genero"]==0){
							$genero='F'	;
						}else{
							$genero='M';
						}
		$respuesta.=
			'
						<td style="text-align:left;!important" id="tdGenero'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionEstudiante(this.id,'.$fila1["cod"].',\'genero\',\'generoAct'.$fila1["cod"].'\','.$fila1['cod'].',\'estudiantes\',\'genero\')">'.$genero.'</td>';

						switch ($fila1['sede']) {
							
							case 1:
								$sede='Sede Julio Jiménez';
								break;
							case 2:
								$sede='Sede La Lejía';
								break;
							case 3:
								$sede='Sede La Melliza';
								break;
							case 4:
								$sede='Sede Monteverde';
								break;
							case 5:
								$sede='Sede Ricardo González';
								break;	
							case 6:
								$sede='Sede Principal';
								break;						
						}

		$respuesta.=
			'
						<td style="text-align:left;!important" id="tdSede'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionEstudiante(this.id,'.$fila1["cod"].',\'sede\',\'sedeAct'.$fila1["cod"].'\','.$fila1['cod'].',\'estudiantes\',\'sede\')">'.$sede.'</td>';

						$tabla="grupos";
						$campo="cod";
						$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1["grupo"]);
						while($fila=mysqli_fetch_array($consulta)){
							$grupo=$fila["grupo"];	
						}	
		$respuesta.='
						<td style="text-align:left;!important" id="tdGrupo'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionEstudiante(this.id,'.$fila1["cod"].',\'grupo\',\'grupoAct'.$fila1["cod"].'\','.$fila1['cod'].',\''.$tabla.'\',\''.$campo.'\')">'.$grupo.'</td>	
						<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionDocentes(6,'.$fila1["cod"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>