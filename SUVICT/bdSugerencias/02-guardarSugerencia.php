<?php
	require('../conexion/datosConexion.php');
	@$idEstudiante = mysqli_real_escape_string($conexion, $_POST["idEstudiante"]);
	@$idArea = mysqli_real_escape_string($conexion, $_POST["idArea"]);
	@$razones = mysqli_real_escape_string($conexion, $_POST["razones"]);
	@$docNominador = mysqli_real_escape_string($conexion, $_POST["docNominador"]);
	@$caso= mysqli_real_escape_string($conexion, $_POST["caso"]);
	@$contenido=mysqli_real_escape_string($conexion, $_POST["contenido"]);
	@$numSubr=mysqli_real_escape_string($conexion, $_POST["numSubr"]);
	@$respuesta='';
	@$razones=explode(",",$razones);

	if($caso==1){//guarda las razones

		$sql=mysqli_query($conexion,'SELECT DISTINCT idRazon FROM estSugeridos  WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idRazon');
		$cntF=mysqli_num_rows($sql);
		if($cntF>0){//Si este estudiante ya tiene razones en la BD...
			while($f=mysqli_fetch_array($sql)){
				$razonesBD[]=$f['idRazon'];
			}
			
			$noSeleccionados=array();
			foreach($razonesBD as $razonBD){
				if(!in_array($razonBD, $razones)){
					$noSeleccionados[]=$razonBD;
				}
			}

			if($noSeleccionados){//Borra las que deseleccionadas...
				foreach($noSeleccionados as $noSeleccionado){
					$sql=mysqli_query($conexion,'DELETE FROM estSugeridos WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$noSeleccionado);
					$respuesta=1;
				}
			}
			
			foreach($razones as $razon) {//Guarda las seleccionadas...
				if(!in_array($razon, $razonesBD)){

					$consulta=mysqli_query($conexion,'INSERT INTO estSugeridos (idEstudiante, idArea, idRazon, docNominador) 
											VALUES ('.$idEstudiante.','.$idArea.',"'.$razon.'",'.$docNominador.')');
					$respuesta=1;
				}
			}

		}else{//Si es la primera vez, las guarda todas.
			foreach ($razones as $razon) {
				$consulta=mysqli_query($conexion,'INSERT INTO estSugeridos (idEstudiante, idArea, idRazon, docNominador) 
											VALUES ('.$idEstudiante.','.$idArea.',"'.$razon.'",'.$docNominador.')');
					$respuesta=1;
			}
		}						
	}else if($caso==2){// guarda las subrazones(argumentos)
		$sql=mysqli_query($conexion,'SELECT DISTINCT idSubrazon FROM estSugeridos  WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idSubrazon');
		$cntF=mysqli_num_rows($sql);
		if($cntF>0){//Si es una modificación de los argumentos

			while($f=mysqli_fetch_array($sql)){
				$subrazonesBD[]=$f['idSubrazon'];
			}
			
			$noSeleccionados=array();
			foreach($subrazonesBD as $subrazonBD){
				if(!in_array($subrazonBD, $razones)){
					$noSeleccionados[]=$subrazonBD;
				}
			}

			if($noSeleccionados){//Si se deseleccionó uno de los argumentos que estaban seleccionados.
				foreach($noSeleccionados as $noSeleccionado){
					$sql=mysqli_query($conexion,'DELETE FROM estSugeridos WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idSubrazon='.$noSeleccionado);
					$respuesta=1;
				}
			}
			
			foreach($razones as $razon) {
				if(!in_array($razon, $subrazonesBD)){//Si se seleccionó un nuevo argumento.
					$idRazon="";
					$sql=mysqli_query($conexion,'SELECT * FROM subrazones WHERE cod='.$razon);
					while($f=mysqli_fetch_array($sql)){
						$idRazon=$f['idRazon'];
					}
					$sql1=mysqli_query($conexion,'SELECT * FROM estSugeridos WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$idRazon);
					$cntFilas=mysqli_num_rows($sql1);
					if($cntFilas>0){
						$idSubrazon="";
						while($f=mysqli_fetch_array($sql1)){
							$idSubrazon=$f['idSubrazon'];
							if($idSubrazon==""){
								$sql2=mysqli_query($conexion,'UPDATE estSugeridos SET idSubrazon="'.$razon.'" WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$idRazon);
									if($sql2){
										$respuesta=1;
									}
							}else{
								$sql2=mysqli_query($conexion,'INSERT INTO estSugeridos (idEstudiante,docNominador,idArea,idRazon,idSubrazon) 
															VALUES ('.$idEstudiante.','.$docNominador.','.$idArea.','.$idRazon.','.$razon.')');
									if($sql2){
										$respuesta=1;
									}
							}
						}
					}
				}else{//No hubo modificacion
					$respuesta=1;
				}
			}
		}else{//Si no es una modificación, sino que se está guardando por primera vez.
			foreach($razones as $razon){
				$idRazon="";
				$sql=mysqli_query($conexion,'SELECT * FROM subrazones WHERE cod='.$razon);
				while($f=mysqli_fetch_array($sql)){
					$idRazon=$f['idRazon'];
				}
				$sql1=mysqli_query($conexion,'SELECT * FROM estSugeridos WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$idRazon);
				$cntFilas=mysqli_num_rows($sql1);
				if($cntFilas==1){
					$idSubrazon="";
					while($f=mysqli_fetch_array($sql1)){
						$idSubrazon=$f['idSubrazon'];
						if($idSubrazon==""){
							$sql2=mysqli_query($conexion,'UPDATE estSugeridos SET idSubrazon="'.$razon.'" WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$idRazon);
								if($sql2){
									$respuesta=1;
								}
						}else{
							$sql2=mysqli_query($conexion,'INSERT INTO estSugeridos (idEstudiante,docNominador,idArea,idRazon,idSubrazon) 
														VALUES ('.$idEstudiante.','.$docNominador.','.$idArea.','.$idRazon.','.$razon.')');
								if($sql2){
									$respuesta=1;
								}
						}
					}
				}else if($cntFilas>1){
					$sql2=mysqli_query($conexion,'INSERT INTO estSugeridos (idEstudiante,docNominador,idArea,idRazon,idSubrazon) 
														VALUES ('.$idEstudiante.','.$docNominador.','.$idArea.','.$idRazon.','.$razon.')');
					if($sql2){
						$respuesta=1;
					}
				}	
			}
		}		
	}else if($caso==3){
		$sql=mysqli_query($conexion,'SELECT * FROM estSugeridos WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idSubrazon='.$numSubr);
		$cntF=mysqli_num_rows($sql);
		if($cntF>0){
			$sql2=mysqli_query($conexion,'UPDATE estSugeridos SET evidencia="'.$contenido.'" WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idSubrazon='.$numSubr);
			if($sql2){
				$respuesta=1;
			}
		}else{
			$sql3=mysqli_query($conexion,'UPDATE estSugeridos SET evidencia="'.$contenido.'" WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$numSubr);
			if($sql3){
				$respuesta=1;
			}
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