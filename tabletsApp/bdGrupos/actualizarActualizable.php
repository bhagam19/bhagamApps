<?php
    include('../conexion/datosConexion.php');
				
    $tabla='grupos';
	$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
	$respuesta="";
	
	while($fila=mysqli_fetch_array($consultaSql)){	
	    
		$respuesta .='
						<tr>
							<td>'.$fila["grupoID"].'</td>
							<td style="text-align:left;!important" id="tdGrupo'.$fila["grupoID"].'" onclick="actualizarInput(this.id,'.$fila["grupoID"].',\'grupo\',\'grupoAct'.$fila["grupoID"].'\')">'.$fila["grupo"].'</td>
							<td><li  onclick="eliminarRegistro('.$fila["grupoID"].')">Eliminar</li></td>
						</tr>
					';			
	}
	
	echo $respuesta;
?>