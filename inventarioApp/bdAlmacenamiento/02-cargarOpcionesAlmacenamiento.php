<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="almacenamiento";
	@$ordenarPor=$_REQUEST['ordenarPor'];	
	if($ordenarPor){			
		$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$ordenarPor);							
	}else{
		$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla);				
	}

	$respuesta="";

	$respuesta.='	
					<tr class="filaFiltros">									
						<td>Nuevo:</td>
						<td><input type="text" name"almacenamiento" id="almacenamiento" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td class="img"><img src="../art/ok.svg" title="Guardar" onclick="registrarAlmacenamiento()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["codAlmacenamiento"].'</td>
						<td style="text-align:left;!important" id="tdAlmacenamiento'.$fila1["codAlmacenamiento"].'" title="Click para modificar" onclick="actualizarInputAlmacen(this.id,'.$fila1["codAlmacenamiento"].',\'nomAlmacenamiento\',\'almacenamientoAct'.$fila1["codAlmacenamiento"].'\')">'.$fila1["nomAlmacenamiento"].'</td>	
						<td class="img"><img src="../art/eliminar.svg" title="Eliminar" onclick="eliminarRegistroAlmacen('.$fila1["codAlmacenamiento"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>