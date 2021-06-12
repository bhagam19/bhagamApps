<?php
	require('../conexion/datosConexion.php');
	@$sede = mysqli_real_escape_string($conexion, $_POST["idSede"]);
	@$grupo = mysqli_real_escape_string($conexion, $_POST["idGrupo"]);
	@$areas = mysqli_real_escape_string($conexion, $_POST["areas"]);
	@$estudiante = mysqli_real_escape_string($conexion, $_POST["estudiante"]);
	@$docNominador = mysqli_real_escape_string($conexion, $_POST["docNominador"]);
	@$enunciaRazon = mysqli_real_escape_string($conexion, $_POST["enunciaRazon"]);
	@$razones = mysqli_real_escape_string($conexion, $_POST["razones"]);
	@$enunciaSubrazon=mysqli_real_escape_string($conexion, $_POST["enunciaSubrazon"]);
	@$idEstudiante = mysqli_real_escape_string($conexion, $_POST["idEstudiante"]);
	@$idArea = mysqli_real_escape_string($conexion, $_POST["idArea"]);
	@$evidencia = mysqli_real_escape_string($conexion, $_POST["enunciaEvidencia"]);
	@$idEstEvdc = mysqli_real_escape_string($conexion, $_POST["idEstEvdc"]);

	@$div = mysqli_real_escape_string($conexion, $_POST["div"]);
	@$reinicio = mysqli_real_escape_string($conexion, $_POST["reinicio"]);
	
	if($sede){//revisada(ok)

		$query = 'SELECT * FROM estudiantes WHERE sede='.$sede;
		$result = mysqli_query($conexion, $query);
		$respuesta='<option>Grupo...</option>';
		$anterior="";
		while($row = mysqli_fetch_array($result)){

			$sql=mysqli_query($conexion,'SELECT * FROM grupos WHERE cod='.$row['grupo']);
			while($fila=mysqli_fetch_array($sql)){

				$actual=$fila['cod'];
				if($anterior!=$actual){
					$respuesta.= '<option value='.$fila['cod'].'>'.$fila['grupo'].'</option>';	
					$anterior=$fila['cod'];
				}else{
					$anterior=$fila['cod'];
				}		
								
			}			    
		}
	}

	if($grupo){//revisada(ok)
		$query = 'SELECT * FROM estudiantes WHERE grupo='.$grupo;
		$result = mysqli_query($conexion, $query);
		$respuesta='<option>Estudiante...</option>';
		while($row = mysqli_fetch_array($result)){
			$respuesta.= '<option value='.$row['cod'].'>'.$row['apellidos'].' '.$row['nombres'].'</option>';				    
		}
	}

	if($estudiante){//revisada(ok)
		$consulta = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$estudiante);
		while($fila = mysqli_fetch_array($consulta)){

			if($fila['genero']=='0'){
				$respuesta= "¿En qué área consideras que ".$fila['nombres']." deba ser nominada?";
			}else{
				$respuesta= "¿En qué área consideras que ".$fila['nombres']." deba ser nominado?";
			}
							    
		}
	}

	if($areas=="si"){//revisada(ok)
		$areasSugeridas=array();
		$sql=mysqli_query($conexion,'SELECT * FROM estSugeridos WHERE idEstudiante='.$estudiante.' AND docNominador='.$docNominador);
		$cnt=1;
		while($fila2=mysqli_fetch_array($sql)){
			$areasSugeridas[$cnt]=$fila2['idArea'];
			$cnt++;
		}
		$consulta = mysqli_query($conexion,'SELECT * FROM areas');
		$respuesta='<option>Areas...</option>';	
		$cnt=0;
		while($fila = mysqli_fetch_array($consulta)){
			foreach($areasSugeridas as $area){
				if($fila['cod']==$area){
					$cnt++;
				}
			}
			if($cnt==0){
				$respuesta.= '<option value='.$fila['cod'].'>'.$fila['area'].'</option>';
			}
			$cnt=0;										    
		}
	}

	if($enunciaRazon){//revisada(ok)
		$consulta = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$enunciaRazon);
		while($fila = mysqli_fetch_array($consulta)){

			if($fila['genero']=='0'){
				$respuesta= "¿Por qué consideras que ella deba ser nominada en esta área?";
			}else{
				$respuesta= "¿Por qué consideras que él deba ser nominado en esta área?";
			}
							    
		}
	}

	if($razones=="si"){//revisada(ok)
		$consulta = mysqli_query($conexion,'SELECT * FROM razSug');
		$respuesta='';
		$cont=1;
		while($fila = mysqli_fetch_array($consulta)){
			$respuesta.= '<div id="divRazon'.$fila["cod"].'" class="divRazon"><input type="checkbox" id="razon'.$fila["cod"].'" value='.$fila['cod'].' onclick="mostrarGuardar()">'.$fila['razSug'].'<br><br></div>';		    
		}
	}

	if($enunciaSubrazon){//revisada(ok)
		$consulta = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$enunciaSubrazon);
		while($fila = mysqli_fetch_array($consulta)){
			$respuesta= "De los siguientes enunciados, ¿cuáles son ciertos para ".$fila['nombres']."?";								    
		}
	}

	if($idEstudiante){
		$subrazonesBD=array();					
		$sql=mysqli_query($conexion,'SELECT DISTINCT idSubrazon FROM estSugeridos  WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idSubrazon');
		$cntF=mysqli_num_rows($sql);
		if($cntF>0){
			while($f=mysqli_fetch_array($sql)){
				$subrazonesBD[]=$f['idSubrazon'];
			}
		}

		$consulta = mysqli_query($conexion,'SELECT  DISTINCT idRazon FROM estSugeridos WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idRazon');
		$respuesta='';
		// $cont=1;
		while($fila = mysqli_fetch_array($consulta)){
			if($fila['idRazon']!=1&&$fila['idRazon']!=2){
				$consulta02 = mysqli_query($conexion,'SELECT * FROM razSug WHERE cod='.$fila['idRazon']);
				while($fila02 = mysqli_fetch_array($consulta02)){
					$consulta03 = mysqli_query($conexion,'SELECT * FROM subrazones WHERE idRazon='.$fila['idRazon']);
					$cntFilas=mysqli_num_rows($consulta03);
					if($cntFilas>0){
						$respuesta.= $fila02['cod'].'. '.$fila02['razSug'].'<br>';					
						$respuesta.='<div id="subrazones'.$fila02['cod'].'" class="divSubrazon">';
						while($fila03 = mysqli_fetch_array($consulta03)){
							if(in_array($fila03['cod'], $subrazonesBD)){
								$respuesta.= '<input type="checkbox" checked id="subrazon'.$fila03["cod"].'" value='.$fila03['cod'].' onclick="mostrarGuardar2()"><span>'.$fila03['subrazon'].'</span><br><br>';
							}else{
								$respuesta.= '<input type="checkbox" id="subrazon'.$fila03["cod"].'" value='.$fila03['cod'].' onclick="mostrarGuardar2()"><span>'.$fila03['subrazon'].'</span><br><br>';
							}
									    
						}
						$respuesta.='</div>';
					}					
				}
			}						  
		}
	}

	if($evidencia){
		$sql = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$evidencia);
		while($f = mysqli_fetch_array($sql)){
			$respuesta= "Por favor, para terminar, danos un breve ejemplo de porqué crees que ".$f['nombres']." tiene las características que seleccionaste.";
		}
	}

	if($idEstEvdc){
		$sql=mysqli_query($conexion,'SELECT DISTINCT idRazon FROM estSugeridos WHERE idEstudiante='.$idEstEvdc.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idRazon');
		$respuesta='';
		while($f=mysqli_fetch_array($sql)){
			$sql2 = mysqli_query($conexion,'SELECT * FROM razSug WHERE cod='.$f['idRazon']);
			while($f2 = mysqli_fetch_array($sql2)){
				$respuesta.= $f2['cod'].'. '.$f2['razSug'].'<br>';
				$respuesta.='<div id="evidencias'.$f2['cod'].'" class="evidencia">';
			}
			$sql3=mysqli_query($conexion,'SELECT idSubrazon,evidencia FROM estSugeridos WHERE idEstudiante='.$idEstEvdc.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$f['idRazon'].' ORDER BY idSubrazon');
			
			while($f3=mysqli_fetch_array($sql3)){
				if($f3['idSubrazon']==""){
					$sql5 = mysqli_query($conexion,'SELECT * FROM razSug WHERE cod='.$f['idRazon']);
					while($f5 = mysqli_fetch_array($sql5)){
						$respuesta.= '<br><textarea id="evidencia'.$f5["cod"].'" value='.$f5['cod'].' onclick="mostrarFinalizar()" rows="2" placeholder="Cuéntanos algo que hayas observado o vivido.">'.$f3['evidencia'].'</textarea><br><br>';									
					}				
				}else{
					$sql6 = mysqli_query($conexion,'SELECT * FROM subrazones WHERE cod='.$f3['idSubrazon']);
					while($f6 = mysqli_fetch_array($sql6)){
						$respuesta.= '<span>'.$f6['cod'].". ".ucfirst($f6['subrazon']).'</span><br><br><textarea id="evidencia'.$f6["cod"].'" value='.$f6['cod'].' onclick="mostrarFinalizar()" rows="2" placeholder="Cuéntanos algo que hayas observado o vivido.">'.$f3['evidencia'].'</textarea><br><br>';
					}
				}
			}
		$respuesta.='</div>';
		}
	}

	if($reinicio){		
		$query = mysqli_query($conexion,'SELECT * FROM sedes');
		$respuesta='<option>Sedes...</option>';
		while($row = mysqli_fetch_array($query)){
			$respuesta.= '<option value='.$row["cod"].'>'.$row["sede"].'</option>';				    
		}
	}

	echo $respuesta;

	mysqli_close($conexion);
?>