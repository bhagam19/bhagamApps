<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="clasesDeBienes";
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
						<td><input type="text" name"claseBien" id="claseBien" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td class="img"><img src="../art/ok.svg" title="Guardar" onclick="registrarClaseBien()"/></td>
					</tr>
				';

	while($fila2=mysqli_fetch_array($sql01)){//$fila2 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila2["codClase"].'</td>
						<td style="text-align:left;!important" id="tdClaseBien'.$fila2["codClase"].'" title="Click para modificar" onclick="actualizarInputClase(this.id,'.$fila2["codClase"].',\'nomClase\',\'claseBienAct'.$fila2["codClase"].'\')">'.$fila2["nomClase"].'</td>	
						<td class="img"><img src="../art/eliminar.svg" title="Eliminar" onclick="eliminarRegistroClase('.$fila2["codClase"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>