<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	$tabla="categoriasDeBienes";
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
						<td><select name="clase" id="clase">
							    <option>Clase...</option> ';
									$consulta=mysqli_query($conexion,"SELECT * FROM clasesDeBienes ORDER BY codClase");
									$clases=array();
									while($clase=mysqli_fetch_assoc($consulta)){
										$clases[$clase["codClase"]] = $clase["nomClase"];
									}	    
									foreach($clases as $idd =>$clase){ 
										$respuesta.='
											<option value="'.$idd.'">'.$clase.'</option>
										';
									}			    
					$respuesta.='		
							</select></td>
						<td><input type="text" name"categoria" id="categoria" style="width:150px" onkeyup="showHint(this.value)"></td>
						<td class="img"><img src="../art/ok.svg" title="Guardar" onclick="registrarCategoria()"/></td>
					</tr>
				';

	while($fila2=mysqli_fetch_array($sql01)){//$fila2 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$sql02=mysqli_query($conexion,"SELECT * FROM clasesDeBienes where codClase=".$fila2["codClase"]);
		while($fila3=mysqli_fetch_array($sql02)){
			$clase=$fila3["nomClase"];
		}

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila2["codCategoria"].'</td>
						<td style="text-align:left;!important" id="tdClase'.$fila2["codCategoria"].'" title="Click para modificar" onclick="actualizarSeleccionCategoria(this.id,'.$fila2["codCategoria"].',\'codClase\',\'claseAct'.$fila2["codCategoria"].'\')">'.$clase.'</td>
						<td style="text-align:left;!important" id="tdCategoria'.$fila2["codCategoria"].'" title="Click para modificar" onclick="actualizarInputCategoria(this.id,'.$fila2["codCategoria"].',\'nomCategoria\',\'categoriaAct'.$fila2["codCategoria"].'\')">'.$fila2["nomCategoria"].'</td>	
						<td class="img"><img src="../art/eliminar.svg" title="Eliminar" onclick="eliminarRegistroCategoria('.$fila2["codCategoria"].')"/></td>
											
					</tr>
			';		
	}
	
	mysqli_free_result($sql01); 
	mysqli_free_result($sql02);

	echo $respuesta;

	mysqli_close($conexion);

?>