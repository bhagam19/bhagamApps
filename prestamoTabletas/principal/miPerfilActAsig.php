<?php
    session_name("presTablet");
    session_start();
    
    include('../conexion/datosConexion.php');
    
    $tabla='asignaturasxDocente';
	$sqlAsignaturas=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID='".$_SESSION['docenteID']."' ORDER BY asignatura");
    
    $respuesta="";
    
    while($asignatura=mysqli_fetch_array($sqlAsignaturas)){
        $tabla='asignaturas';
	    $sqlNombreAsignaturas=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE asignaturaID='".$asignatura["asignatura"]."'");
    	while($nombreAsignatura=mysqli_fetch_array($sqlNombreAsignaturas)){
        	$respuesta .= '
                            <tr>
                                <td>'.mb_convert_case($nombreAsignatura["asignatura"], MB_CASE_TITLE, "UTF-8").'</td>
                                <td><li  onclick="eliminarAsignaturas('.$asignatura["asignatura"].')">Eliminar</li></td>
                            </tr>
                          '; 
    	}
    }
    
    echo $respuesta;
    
?>