<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="usuarios";
	@$campo=$_REQUEST['campo'];
	@$direccion=$_REQUEST['direccion'];	
	if($campo){			
		switch ($direccion) {
			case 0:
				$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$campo." ASC");
				break;
			case 1:
				$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$campo." DESC");
				break;
		}

	}else{
		$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla);				
	}

	$respuesta="";

	$respuesta.='	
					<tr>									
						<td>Nuevo:</td>
						<td><input type="text" name"usuarioCED" id="usuarioCED" style="width:50px" onkeyup="showHint(this.value)"></td>
						<td><input type="text" name"apellidos" id="apellidos" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><input type="text" name"nombres" id="nombres" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><input type="text" name"usuario" id="usuario" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><input type="text" name"contrasena" id="contrasena" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td><select name="defUsuario" id="defUsuario">
							<option>Seleccione...</option>
							<option value=1>SÍ</option>
							<option value=0>NO</option> </td>
						<td><select name="permiso" id="permiso">
							<option>Seleccione...</option>
							<option value=1>Responsable</option>
							<option value=2>SSO</option>
							<option value=3>Responsable Inventario</option>
							<option value=4>Administrador 01</option>
							<option value=5>Rector</option> 
							<option value=6>Desarrollador</option></td>
						<td class="img"><img src="../art/ok.svg" title="Guardar" onclick="registrarNuevoUsuario()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$responsabilidad="";
		$permiso="";

		if($fila1['defUsuario']==1){
			$responsabilidad="SI";
		}else{
			$responsabilidad="NO";
		}

		if($fila1['permiso']==6){
			$permiso="Desarrollador";
		}else if($fila1['permiso']==5){
			$permiso="Rector";
		}else if($fila1['permiso']==4){
			$permiso="Administrador 01";
		}else if($fila1['permiso']==3){
			$permiso="Resp Inventario";
		}else if($fila1['permiso']==2){
			$permiso="Servidor Social";
		}else if($fila1['permiso']==1){
			$permiso="Responsable";
		}else if($fila1['permiso']==0){
			$permiso="Visitante";
		}

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["usuarioID"].'</td>
						<td style="padding:0px 15px; text-align:right;!important" id="tdUsuarioCED'.$fila1["usuarioID"].'" title="Dobleclick para modificar" ondblclick="actualizarInputUsuario(this.id,'.$fila1["usuarioID"].',\'usuarioCED\',\'usuarioCEDAct'.$fila1["usuarioID"].'\')">'.$fila1["usuarioCED"].'</td>	
						<td style="text-align:left;!important" id="apellidos'.$fila1["usuarioID"].'" title="Dobleclick para modificar" ondblclick="actualizarInputUsuario(this.id,'.$fila1["usuarioID"].',\'apellidos\',\'apellidosAct'.$fila1["usuarioID"].'\')">'.$fila1["apellidos"].'</td>	
						<td style="text-align:left;!important" id="nombres'.$fila1["usuarioID"].'" title="Dobleclick para modificar" ondblclick="actualizarInputUsuario(this.id,'.$fila1["usuarioID"].',\'nombres\',\'nombresAct'.$fila1["usuarioID"].'\')">'.$fila1["nombres"].'</td>	
						<td style="text-align:left;!important" id="tdUsuario'.$fila1["usuarioID"].'" title="Dobleclick para modificar" ondblclick="actualizarInputUsuario(this.id,'.$fila1["usuarioID"].',\'usuario\',\'usuarioAct'.$fila1["usuarioID"].'\')">'.$fila1["usuario"].'</td>
						<td style="text-align:left;!important" id="tdConstrasena'.$fila1["usuarioID"].'" title="Dobleclick para modificar" ondblclick="actualizarInputUsuario(this.id,'.$fila1["usuarioID"].',\'contrasena\',\'contrasenaAct'.$fila1["usuarioID"].'\')">'.$fila1["contrasena"].'</td>
						<td style="text-align:center;!important" id="responsabilidad'.$fila1["usuarioID"].'" title="Dobleclick para modificar" ondblclick="actualizarSeleccionUsuario(this.id,'.$fila1["usuarioID"].',\'defUsuario\',\'responsabilidadAct'.$fila1["usuarioID"].'\','.$fila1['defUsuario'].')">'.$responsabilidad.'</td>	
						<td style="text-align:center;!important" id="permiso'.$fila1["usuarioID"].'" title="Dobleclick para modificar" ondblclick="actualizarSeleccionUsuario(this.id,'.$fila1["usuarioID"].',\'permiso\',\'permisoAct'.$fila1["usuarioID"].'\','.$fila1['permiso'].')">'.$permiso.'</td>	
						<td class="img"><img src="../art/eliminar.svg" title="Eliminar" ondblclick="eliminarRegistroUsuario('.$fila1["usuarioID"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>