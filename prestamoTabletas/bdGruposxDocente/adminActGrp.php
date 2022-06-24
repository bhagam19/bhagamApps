<?php
    include('../conexion/datosConexion.php');
    
    $docenteID=$_REQUEST["docenteID"];
    
    $tabla='gruposxDocente';
	$sqlGrupos=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID='".$docenteID."' ORDER BY grupo");
    
    $respuesta="";
    
    while($grupo=mysqli_fetch_array($sqlGrupos)){
        $tabla='grupos';
	    $sqlNombreGrupo=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE grupoID='".$grupo["grupo"]."'");
    	while($nombreGrupo=mysqli_fetch_array($sqlNombreGrupo)){
        	$respuesta .= '
                            <tr>
                                <td>'.mb_convert_case($nombreGrupo["grupo"], MB_CASE_TITLE, "UTF-8").'</td>
                                <td><li  onclick="eliminarGrupoAdmin('.$grupo["grupoID"].')">Eliminar</li></td>
                            </tr>
                          '; 
    	}
    }
    
    echo $respuesta;
    
?>
            