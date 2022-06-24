<?php
    include('../conexion/datosConexion.php');
				
    $tabla='usuarios';
	$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
	$respuesta;
	
	while($fila=mysqli_fetch_array($consultaSql)){	
	    
	    $tabla="docentes";
		$docente="";
		$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$fila['docenteID']);
		while($profe=mysqli_fetch_array($sql)){
			$docente=$profe['nombres']." ".$profe['apellidos'];
		}
		$respuesta .='
						<tr>
							<td>'.$fila["usuarioID"].'</td>
							<td id="tdDocenteID'.$fila["usuarioID"].'">'.$fila["docenteID"].'</td>
							<td id="tdDocente'.$fila["usuarioID"].'" onclick="actualizarDocente()">'.$docente.'</td>
							<td id="tdUsuario'.$fila["usuarioID"].'" onclick="actualizarInput(this.id,'.$fila["usuarioID"].',\'usuario\',\'usuarioAct'.$fila["usuarioID"].'\')">'.$fila["usuario"].'</td>
							<td id="tdPermiso'.$fila["usuarioID"].'" onclick="actualizarPermiso(this.id,'.$fila["usuarioID"].',\'permiso\',\'permisoAct'.$fila["usuarioID"].'\')">'.$fila["permiso"].'</td>
							<td><li  onclick="eliminarRegistro('.$fila["usuarioID"].')">Eliminar</li></td>
						</tr>
					';			
	}
	
	echo $respuesta;
?>