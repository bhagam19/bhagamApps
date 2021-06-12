<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="areas";
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
						<td><input type="text" name"area" id="area" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td class="img"><img src="../art/ok.png" style="height:30px; width:30px" title="Guardar" onclick="registrarArea()"/></td>
					</tr>
				';

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["cod"].'</td>
						<td style="text-align:left;!important" id="tdArea'.$fila1["cod"].'" title="Click para modificar" onclick="actualizarInputArea(this.id,'.$fila1["cod"].',\'area\',\'almacenamientoAct'.$fila1["cod"].'\')">'.$fila1["area"].'</td>	
						<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionAreas(6,'.$fila1["cod"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>