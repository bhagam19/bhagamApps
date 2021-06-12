<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="estNominados";
	@$ordenarPor=$_REQUEST['ordenarPor'];	
	@$o=$_REQUEST['o'];	
	if($ordenarPor){	
		if($o==0){
			$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$ordenarPor." ASC");
		}else{
			$sql01=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$ordenarPor." DESC");
		}							
	}else{
		$sql01=mysqli_query($conexion,'SELECT * FROM '.$tabla.' ORDER BY cod');				
	}

	$respuesta="";

	while($fila1=mysqli_fetch_array($sql01)){//$fila1 es un arr. multidemensional que contiene arr. con cada registro de cada tabla.

		$respuesta.=
			'
					<tr>									
						
						<td style="text-align:center">'.$fila1["cod"].'</td>';

						$consulta=mysqli_query($conexion,"SELECT * FROM docentes WHERE cod=".$fila1['docNominador']);
						while($row=mysqli_fetch_array($consulta)){
							$respuesta.= '<td style="text-align:left;!important">'.$row["nombres"].' '.$row['apellidos'].'</td>';
						}

						$consulta=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE cod=".$fila1['codEstudiante']);
						while($row=mysqli_fetch_array($consulta)){
							$respuesta.= '<td style="text-align:left;!important">'.$row["apellidos"].' '.$row['nombres'].'</td>';
						}
						$consulta=mysqli_query($conexion,"SELECT * FROM areas WHERE cod=".$fila1['codArea']);
						while($row=mysqli_fetch_array($consulta)){
							$title= $row['cod'].". ".$row["area"];
							$respuesta.= '<td style="text-align:left;!important" title="'.$title.'">'.$row['area'].'</td>';
						}						

						$title="";
						$consulta=mysqli_query($conexion,"SELECT * FROM condiciones WHERE cod=".$fila1['codCondicion']);
						while($row=mysqli_fetch_array($consulta)){
							$condicion="";
							switch($row['tipoCondicion']){
								case 1:
									$condicion="Cognitiva";
									break;
								case 2:
									$condicion="Afectiva";
									break;
								case 3:
									$condicion="Expresiva";
									break;
							}
							$title= $row['tipoCondicion'].". ".$condicion;	
							$respuesta.='<td style="text-align:left;!important" title="'.$title.'">'.$row['tipoCondicion'].'</td>';
							$title= $row['cod'].". ".$row['descripcion'];
							$respuesta.='<td style="text-align:left;!important" title="'.$title.'">'.$row['cod'].'</td>';
							$frecuencia="";
							switch($fila1['frecCondicion']){
								case 0:
									$frecuencia="No evidenciado";
									break;
								case 1:
									$frecuencia="Pocas Veces";
									break;
								case 2:
									$frecuencia="A veces";
									break;
								case 3:
									$frecuencia="Casi Siempre";
									break;
								case 4:
									$frecuencia="Siempre";
									break;
							}
							$title= $fila1['frecCondicion'].". ".$frecuencia;	
							$respuesta.='<td style="text-align:left;!important" title="'.$title.'">'.$fila1['frecCondicion'].'</td>';
						}
						$respuesta.='							
								<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionPermisos(6,'.$fila1["cod"].')"/></td>
							</tr>
						';	
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>