<?php
    session_name("presTablet");
	session_start();
    
    include('../conexion/datosConexion.php');
    
	$docenteID=$_SESSION['docenteID'];
	$peticion=mysqli_query($conexion,"SELECT * FROM gruposxDocente WHERE docenteID=".$docenteID." ORDER BY grupo");
	$idGrupos=array();
	$contador=1;
	while($grupo=mysqli_fetch_assoc($peticion)){
		$idGrupos[$contador] = $grupo['grupo'];
		$contador++;
	}
	
	//Se crea un array con el nombre de los grupos que corresponden a los ID guardados en el paso anterior.
	$peticion=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY grupoID");
	$nombreGrupos=array();
	$contador=1;
	while($grupo=mysqli_fetch_assoc($peticion)){
		if($grupo['grupoID']==$idGrupos[$contador]){
			$nombreGrupos[$contador] = $grupo["grupo"];
			$contador++;
		}
	}
	
    $respuesta = '
        <label>
        	<span>Grupo:</span>
        	<select name="grupo" id="grupo">
    	    	<option>Grupo...</option>
    ';
    
    foreach($nombreGrupos as $idd =>$grupo){ 
		$respuesta .= '
                <option value="'.$grupo.'">'.$grupo.'</option>
		';
	}
	
	$respuesta .='
    	    </select>  
        </label>
	';

    echo $respuesta;

?>