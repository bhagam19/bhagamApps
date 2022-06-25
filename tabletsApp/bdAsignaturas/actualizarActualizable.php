<?php
    include('../conexion/datosConexion.php');
				
    $tabla='asignaturas';
	$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
	$respuesta;
	
	while($fila=mysqli_fetch_array($consultaSql)){	
	    
		$respuesta .='
						<tr>
							<td>'.$fila["asignaturaID"].'</td>
							<td style="text-align:left;!important" id="tdAsignatura'.$fila["asignaturaID"].'" onclick="actualizarInput(this.id,'.$fila["asignaturaID"].',\'asignatura\',\'asignaturaAct'.$fila["asignaturaID"].'\')">'.$fila["asignatura"].'</td>
							<td><li  onclick="eliminarRegistro('.$fila["asignaturaID"].')">Eliminar</li></td>
						</tr>
					';			
	}
	
	echo $respuesta;
?>