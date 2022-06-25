<?php
    session_name("presTablet");
    session_start();
    
    include('../conexion/datosConexion.php');
    
    $tabla='gruposxDocente';
	$sqlGrupos=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID='".$_SESSION['docenteID']."' ORDER BY grupo");
    
    $respuesta="";
    
    while($grupo=mysqli_fetch_array($sqlGrupos)){
        $tabla='grupos';
	    $sqlNombreGrupos=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE grupoID='".$grupo["grupo"]."'");
    	while($nombreGrupo=mysqli_fetch_array($sqlNombreGrupos)){
        	$respuesta .= '
                            <tr>
                                <td>'.mb_convert_case($nombreGrupo["grupo"], MB_CASE_TITLE, "UTF-8").'</td>
                                <td><li  onclick="eliminarGrupo('.$grupo["grupo"].')">Eliminar</li></td>
                            </tr>
                          '; 
    	}
    }
    
    echo $respuesta;
    
?>