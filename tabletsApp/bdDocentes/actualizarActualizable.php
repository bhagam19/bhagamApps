<?php
    include('../conexion/datosConexion.php');				
    $tabla='docentes';
	$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
	$respuesta="";	
	while($fila=mysqli_fetch_array($consultaSql)){	
	    
		$respuesta .='
						<tr>
							<td>'.$fila["docenteID"].'</td>
							<td style="text-align:left;!important" id="tdApellidos'.$fila["docenteID"].'" onclick="actualizarInput(this.id,'.$fila["docenteID"].',\'apellidos\',\'apellidosAct'.$fila["docenteID"].'\')">'.$fila["apellidos"].'</td>
							<td style="text-align:left;!important" id="tdNombres'.$fila["docenteID"].'" onclick="actualizarInput(this.id,'.$fila["docenteID"].',\'nombres\',\'nombresAct'.$fila["docenteID"].'\')">'.$fila["nombres"].'</td>
							<td><li  onclick="eliminarRegistro('.$fila["docenteID"].')">Eliminar</li></td>
						</tr>
					';			
	}
	
	echo $respuesta;
?>