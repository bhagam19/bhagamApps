<?php
    include('../conexion/datosConexion.php');
				
    $respuesta;
	$tabla='gruposxDocente';
	$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
	while($fila=mysqli_fetch_array($consultaSql)){
		$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuarioID=".$fila["usuarioID"]);
		while($fila2=mysqli_fetch_array($sql)){
			$usuario=$fila2["usuario"];
		}
		$sql=mysqli_query($conexion,"SELECT * FROM docentes WHERE docenteID=".$fila["docenteID"]);
		while($fila2=mysqli_fetch_array($sql)){
			$docente=$fila2["apellidos"]." ".$fila2["nombres"];
		}
		$sql=mysqli_query($conexion,"SELECT * FROM grupos WHERE grupoID=".$fila["grupo"]);
		while($fila2=mysqli_fetch_array($sql)){
			$grupo=$fila2["grupo"];
		}
	    
		$respuesta .='
						<tr>
							<td>'.$fila["grupoID"].'</td>
							<td style="text-align:left;!important" id="tdUsuario'.$fila["grupoID"].'" onclick="actualizarInput(this.id,'.$fila["grupoID"].',\'usuario\',\'usuarioAct'.$fila["grupoID"].'\')">'.$usuario.'</td>
							<td style="text-align:left;!important" id="tdDocente'.$fila["grupoID"].'" onclick="actualizarInput(this.id,'.$fila["grupoID"].',\'docente\',\'docenteAct'.$fila["grupoID"].'\')">'.$docente.'</td>
							<td style="text-align:left;!important" id="tdAsignatura'.$fila["grupoID"].'" onclick="actualizarInput(this.id,'.$fila["grupoID"].',\'grupo\',\'grupoAct'.$fila["grupoID"].'\')">'.$grupo.'</td>
						</tr>
					';			
	}
	
	echo $respuesta;
?>