<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="docentes";
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
						<td><input type="text" name="usuario" id="usuario" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><input type="text" name="contrasena" id="contrasena" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><select name="genero" id="genero">
							    <option>Genero...</option>
								<option value=0>F</option>
								<option value=1>M</option>	
							</select></td>
						<td><select name="permiso" id="permiso">
							    <option>Permisos...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM permisos ORDER BY cod");
									$permisos=array();
									while($permiso=mysqli_fetch_assoc($consulta)){
										$permisos[$permiso["cod"]] = $permiso["permisos"];
									}	    
									foreach($permisos as $idd =>$permiso){ 
										$respuesta.='
											<option value="'.$idd.'">'.$permiso.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td class="img"><img src="../art/ok.png" style="height:30px; width:30px" title="Guardar" onclick="registrarDocente()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["cod"].'</td>
						<td style="text-align:left;!important" id="tdID'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputDocente(this.id,'.$fila1["cod"].',\'ID\',\'IDAct'.$fila1["cod"].'\')">'.$fila1["ID"].'</td>
						<td style="text-align:left;!important" id="tdApellidos'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputDocente(this.id,'.$fila1["cod"].',\'apellidos\',\'apellidosAct'.$fila1["cod"].'\')">'.$fila1["apellidos"].'</td>
						<td style="text-align:left;!important" id="tdNombres'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputDocente(this.id,'.$fila1["cod"].',\'nombres\',\'nombreAct'.$fila1["cod"].'\')">'.$fila1["nombres"].'</td>
						<td style="text-align:left;!important" id="tdUsuario'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputDocente(this.id,'.$fila1["cod"].',\'usuario\',\'usuarioAct'.$fila1["cod"].'\')">'.$fila1["usuario"].'</td>
						<td style="text-align:left;!important" id="tdContrasena'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputDocente(this.id,'.$fila1["cod"].',\'contrasena\',\'contrasenaAct'.$fila1["cod"].'\')">'.$fila1["contrasena"].'</td>';

						if($fila1['genero']==0){
							$genero="F";
						}else{
							$genero="M";
						}
		$respuesta.='
						<td style="text-align:left;!important" id="tdGenero'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionDocente(this.id,'.$fila1["cod"].',\'genero\',\'generoAct'.$fila1["cod"].'\')">'.$genero.'</td>
						';						
						$tabla="permisos";
						$campo="cod";
						$consulta=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1["permiso"]);
						while($fila=mysqli_fetch_array($consulta)){
							$permiso=$fila["permisos"];
						}	
		$respuesta.='
						<td style="text-align:left;!important" id="tdPermisos'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarSeleccionDocente(this.id,'.$fila1["cod"].',\'permiso\',\'permisoAct'.$fila1["cod"].'\','.$fila1['cod'].',\''.$tabla.'\',\''.$campo.'\')">'.$permiso.'</td>	
						<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionDocentes(6,'.$fila1["cod"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>