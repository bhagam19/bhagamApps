<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="dependencias";
	@$ordenarPor=$_REQUEST['ordenarPor'];	
	if($ordenarPor){			
		$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$ordenarPor);							
	}else{
		$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	}
	$respuesta="";
	$respuesta.='	
					<tr>									
						<td>Nuevo:</td>
						<td><input type="text" name"dependencia" id="dependencia" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><select name="ubicacion" id="ubicacion">
							    <option>Ubicación...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM ubicaciones ORDER BY codUbicacion");
									$ubicaciones=array();
									while($ubicacion=mysqli_fetch_assoc($consulta)){
										$ubicaciones[$ubicacion["codUbicacion"]] = $ubicacion["nomUbicacion"];
									}	    
									foreach($ubicaciones as $idd =>$ubicacion){ 
										$respuesta.='
											<option value="'.$idd.'">'.$ubicacion.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td><select name="nomResponsable" id="nomResponsable">
							    <option>Responsable...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM usuarios ORDER BY apellidos");
									$usuarios=array();
									while($usuario=mysqli_fetch_assoc($consulta)){
										$usuarios[$usuario["usuarioID"]] = $usuario["apellidos"]." ".$usuario["nombres"];
									}	    
									foreach($usuarios as $idd =>$usuario){ 
										$respuesta.='
											<option value="'.$idd.'">'.$usuario.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td class="img"><img src="../art/ok.svg" title="Guardar" onclick="registrarDependencia()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["codDependencias"].'</td>
						<td style="text-align:left;!important" id="tdDependencia'.$fila1["codDependencias"].'" title="Dobleclick para modificar" ondblclick="actualizarInputDependencia(this.id,'.$fila1["codDependencias"].',\'nomDependencias\',\'dependenciaAct'.$fila1["codDependencias"].'\')">'.$fila1["nomDependencias"].'</td>
			';
		$tabla="ubicaciones";
		$campo="codUbicacion";
		$sql02=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1['codUbicacion']);
		while($fila2=mysqli_fetch_array($sql02)){
			$respuesta.=
			'
						<td style="text-align:left;!important" id="tdUbicacion'.$fila1["codDependencias"].'" title="Dobleclick para modificar" ondblclick="actualizarSeleccionDependencia(this.id,'.$fila1["codDependencias"].',\'codUbicacion\',\'ubicacionAct'.$fila1["codDependencias"].'\','.$fila1['codUbicacion'].',\''.$tabla.'\',\''.$campo.'\')">'.$fila2["nomUbicacion"].'</td>
			';	

		}
		$tabla="usuarios";
		$campo="usuarioID";
		$sql03=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE ".$campo."=".$fila1['usuarioID']);
		while($fila3=mysqli_fetch_array($sql03)){
			$respuesta.=
			'
						<td style="text-align:left;!important" id="tdUsuario'.$fila1["codDependencias"].'" title="Dobleclick para modificar" ondblclick="actualizarSeleccionDependencia(this.id,'.$fila1["codDependencias"].',\'usuarioID\',\'usuarioAct'.$fila1["codDependencias"].'\','.$fila1['usuarioID'].',\''.$tabla.'\',\''.$campo.'\')">'.$fila3["apellidos"]." ".$fila3["nombres"].'</td>
						<td class="img"><img src="../art/eliminar.svg" title="Eliminar" onclick="eliminarRegistroDependencia('.$fila1["codDependencias"].')"/></td>
					</tr>
			';
		}	
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>