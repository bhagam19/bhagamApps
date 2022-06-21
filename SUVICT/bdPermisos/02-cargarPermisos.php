<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="permisos";
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
						<td><input type="text" name"permiso" id="permiso" style="width:150px" onkeyup="showHint(this.value)"></td>						
						<td class="img"><img src="../art/ok.png" style="height:30px; width:30px" title="Guardar" onclick="registrarPermiso()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["cod"].'</td>
						<td style="text-align:left;!important" id="tdPermiso'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputPermiso(this.id,'.$fila1["cod"].',\'permisos\',\'permisoAct'.$fila1["cod"].'\')">'.$fila1["permisos"].'</td>	
						<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionPermisos(6,'.$fila1["cod"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>