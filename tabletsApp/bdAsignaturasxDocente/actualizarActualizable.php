<?php
    include('../conexion/datosConexion.php');
				
    $respuesta;
	$tabla='asignaturasxDocente';
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
		$sql=mysqli_query($conexion,"SELECT * FROM asignaturas WHERE asignaturaID=".$fila["asignatura"]);
		while($fila2=mysqli_fetch_array($sql)){
			$asignatura=$fila2["asignatura"];
		}
	    
		$respuesta .='
						<tr>
							<td>'.$fila["asignaturaID"].'</td>
							<td style="text-align:left;!important" id="tdUsuario'.$fila["asignaturaID"].'" onclick="actualizarInput(this.id,'.$fila["asignaturaID"].',\'usuario\',\'usuarioAct'.$fila["asignaturaID"].'\')">'.$usuario.'</td>
							<td style="text-align:left;!important" id="tdDocente'.$fila["asignaturaID"].'" onclick="actualizarInput(this.id,'.$fila["asignaturaID"].',\'docente\',\'docenteAct'.$fila["asignaturaID"].'\')">'.$docente.'</td>
							<td style="text-align:left;!important" id="tdAsignatura'.$fila["asignaturaID"].'" onclick="actualizarInput(this.id,'.$fila["asignaturaID"].',\'asignatura\',\'asignaturaAct'.$fila["asignaturaID"].'\')">'.$asignatura.'</td>
						</tr>
					';			
	}
	
	echo $respuesta;
?>