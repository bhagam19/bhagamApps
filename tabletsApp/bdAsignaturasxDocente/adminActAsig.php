<?php
    include('../conexion/datosConexion.php');    
    $docenteID=$_REQUEST["docenteID"];    
    $tabla='asignaturasxDocente';
	$sqlAsignaturas=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID='".$docenteID."' ORDER BY asignatura");    
    $respuesta="";    
    while($asignatura=mysqli_fetch_array($sqlAsignaturas)){
        $tabla='asignaturas';
	    $sqlNombreAsignatura=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE asignaturaID='".$asignatura["asignatura"]."'");
    	while($nombreAsignatura=mysqli_fetch_array($sqlNombreAsignatura)){
        	$respuesta .= '
                            <tr>
                                <td>'.mb_convert_case($nombreAsignatura["asignatura"], MB_CASE_TITLE, "UTF-8").'</td>
                                <td><li  onclick="eliminarAsignaturaAdmin('.$asignatura["asignaturaID"].')">Eliminar</li></td>
                            </tr>
                          '; 
    	}
    }    
    echo $respuesta;    
?>            