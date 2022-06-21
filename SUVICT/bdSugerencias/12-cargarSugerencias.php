<?php
    include('../conexion/datosConexion.php');

	setlocale(LC_MONETARY,"es_CO"); //para establecer el localismo para la moned
	
	$tabla="estSugeridos";
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

						$consulta=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE cod=".$fila1['idEstudiante']);
						while($row=mysqli_fetch_array($consulta)){
							$respuesta.= '<td style="text-align:left;!important">'.$row["apellidos"].' '.$row['nombres'].'</td>';
							$consulta=mysqli_query($conexion,"SELECT * FROM grupos WHERE cod=".$row['grupo']);
							while($row2=mysqli_fetch_array($consulta)){
								$respuesta.= '<td style="text-align:left;!important">'.$row2["grupo"].'</td>';
							}
						}						

						$consulta=mysqli_query($conexion,"SELECT * FROM areas WHERE cod=".$fila1['idArea']);
						while($row=mysqli_fetch_array($consulta)){
							$respuesta.= '<td style="text-align:left;!important">'.$row["area"].'</td>';
						}

						$title="";
						$consulta=mysqli_query($conexion,"SELECT * FROM razSug WHERE cod=".$fila1['idRazon']);
						while($row=mysqli_fetch_array($consulta)){
							$title.= $fila1['idRazon'].". ".$row['razSug']."\n\n";
						}
						$respuesta.='							
							<td style="text-align:left;!important" title="'.$title.'">'.$fila1['idRazon'].'</td>
						';

						$title="";
						if($fila1['idSubrazon']==""){
							$title.="";
						}else{
							$consulta=mysqli_query($conexion,"SELECT * FROM subrazones WHERE cod=".$fila1['idSubrazon']);
							while($row=mysqli_fetch_array($consulta)){
								$title.= $fila1['idSubrazon'].". ".$row['subrazon']."\n\n";
							}
						}
						$respuesta.='							
							<td style="text-align:left;!important" title="'.$title.'">'.$fila1['idSubrazon'].'</td>
						';
						$respuesta.='							
							<td style="text-align:left;!important">'.$fila1['evidencia'].'</td>
						';
						$respuesta.='							
								<td class="img"><img src="../art/eliminar.png" title="Eliminar" onclick="confirmarAccionPermisos(6,'.$fila1["cod"].')"/></td>
							</tr>
						';	
	}
	
	mysqli_free_result($sql01); 
	echo $respuesta;
	mysqli_close($conexion);

?>