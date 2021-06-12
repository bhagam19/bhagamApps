<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="mantenimiento";
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
						<td><input type="text" name"mantenimiento" id="mantenimiento" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td class="img"><img src="../art/ok.svg" title="Guardar" onclick="registrarMantenimiento()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["codMantenimiento"].'</td>
						<td style="text-align:left;!important" id="tdMantenimiento'.$fila1["codMantenimiento"].'" title="Click para modificar" onclick="actualizarInputMantenimiento(this.id,'.$fila1["codMantenimiento"].',\'nomMantenimiento\',\'almacenamientoAct'.$fila1["codMantenimiento"].'\')">'.$fila1["nomMantenimiento"].'</td>	
						<td class="img"><img src="../art/eliminar.svg" title="Eliminar" onclick="eliminarRegistroMantenimiento('.$fila1["codMantenimiento"].')"/></td>	
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>