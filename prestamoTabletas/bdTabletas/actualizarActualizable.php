<?php
    include('../conexion/datosConexion.php');
				
    $tabla='tabletas';
	$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
	$respuesta;
	
	while($fila=mysqli_fetch_array($consultaSql)){	
	    
	    $estado="";
	    if($fila['estado']==0){
	    	$estado="Mala";
	    }else{
	    	$estado="Buena";
	    }
	    
		$respuesta .='
						<tr>
							<td>'.$fila["tabletaID"].'</td>
							<td id="tdSerial'.$fila["tabletaID"].'" onclick="actualizarInput(this.id,'.$fila["tabletaID"].',\'serial\',\'serialAct'.$fila["tabletaID"].'\')">'.$fila["serial"].'</td>
							<td id="tdEstado'.$fila["tabletaID"].'" onclick="actualizarEstado(this.id,'.$fila["tabletaID"].',\'estado\',\'estadoAct'.$fila["tabletaID"].'\')">'.$estado.'</td>
							<td><li  onclick="eliminarRegistro('.$fila["tabletaID"].')">Eliminar</li></td>
						</tr>
					';			
	}
	
	echo $respuesta;
?>