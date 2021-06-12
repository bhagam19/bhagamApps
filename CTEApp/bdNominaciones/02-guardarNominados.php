<?php
	require('../conexion/datosConexion.php');
	@$codEstudiante = mysqli_real_escape_string($conexion, $_POST["codEstudiante"]);
	@$codArea = mysqli_real_escape_string($conexion, $_POST["codArea"]);
	@$condiciones = json_decode($_POST["condiciones"],true);
	@$docNominador = mysqli_real_escape_string($conexion, $_POST["docNominador"]);
	@$tipoCondicion= mysqli_real_escape_string($conexion, $_POST["tipoCondicion"]);	
	@$respuesta='';

	$sql=mysqli_query($conexion,'SELECT DISTINCT codCondicion,frecCondicion FROM estNominados  WHERE codEstudiante='.$codEstudiante.' AND codArea='.$codArea.' AND docNominador='.$docNominador.' AND tipoCondicion='.$tipoCondicion.' ORDER BY codCondicion');
	$cntF=mysqli_num_rows($sql);
	if($cntF>0){//Si este estudiante ya tiene estas condiciones, nominadas por este docente, en la BD...
		foreach($condiciones as $variable){
			$consulta=mysqli_query($conexion,'UPDATE estNominados SET frecCondicion='.$variable[1].' WHERE codEstudiante='.$codEstudiante.' AND codArea='.$codArea.' AND docNominador='.$docNominador.' AND codCondicion='.$variable[0].' AND tipoCondicion='.$tipoCondicion);
			$respuesta=1;		
		}
	}else{
		foreach($condiciones as $variable){
			$consulta=mysqli_query($conexion,'INSERT INTO estNominados (codEstudiante, codArea, docNominador, codCondicion,tipoCondicion,frecCondicion)
											VALUES ('.$codEstudiante.','.$codArea.','.$docNominador.','.$variable[0].','.$tipoCondicion.','.$variable[1].')');
			$respuesta=1;		
		}
	}

	if($respuesta==1){
		echo "si";
	}else{
		echo "no";
	}

	// echo $respuesta;

	mysqli_close($conexion);
?>