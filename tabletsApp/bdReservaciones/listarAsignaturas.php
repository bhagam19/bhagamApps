<?php
    session_name("presTablet");
	session_start();
    
    include('../conexion/datosConexion.php');

    $docenteID=$_SESSION['docenteID'];
	$peticion=mysqli_query($conexion,"SELECT * FROM asignaturasxDocente WHERE docenteID=".$docenteID." ORDER BY asignatura");
	$idAsignaturas=array();
	$contador=1;
	while($asignatura=mysqli_fetch_assoc($peticion)){
		$idAsignaturas[$contador] = $asignatura['asignatura'];
		$contador++;
	}
	
	//Se crea un array con el nombre de las asignaturas que corresponden a los ID guardados en el paso anterior.
	$peticion=mysqli_query($conexion,"SELECT * FROM asignaturas ORDER BY asignaturaID");
	$nombreAsignaturas=array();
	$contador=1;
	while($asignatura=mysqli_fetch_assoc($peticion)){
		if($asignatura['asignaturaID']==$idAsignaturas[$contador]){
			$nombreAsignaturas[$contador] = $asignatura["asignatura"];
			$contador++;
		}
	}
    
    $respuesta = '
        <label>
        	<span>Asignatura:</span>
        	<select name="asignatura" id="asignatura">
    	    	<option>Asignatura...</option>
    ';
    
    foreach($nombreAsignaturas as $idd =>$asignatura){ 
		$respuesta .= '
                <option value="'.$asignatura.'">'.$asignatura.'</option>
		';
	}
	
	$respuesta .='
    	    </select>  
        </label>
	';

    echo $respuesta;

?>