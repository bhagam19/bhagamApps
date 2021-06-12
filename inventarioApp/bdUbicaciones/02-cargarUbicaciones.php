<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="ubicaciones";
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
						<td><input type="text" name"ubicacion" id="ubicacion" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td class="img"><img src="../art/ok.svg" title="Guardar" onclick="registrarUbicacion()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["codUbicacion"].'</td>
						<td style="text-align:left;!important" id="tdUbicacion'.$fila1["codUbicacion"].'" title="Click para modificar" onclick="actualizarInputUbicacion(this.id,'.$fila1["codUbicacion"].',\'nomUbicacion\',\'ubicacionAct'.$fila1["codUbicacion"].'\')">'.$fila1["nomUbicacion"].'</td>	
						<td class="img"><img src="../art/eliminar.svg" title="Eliminar" onclick="eliminarRegistroUbicacion('.$fila1["codUbicacion"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>