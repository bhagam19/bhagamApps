<?php
	require('../conexion/datosConexion.php');
	@$caso = mysqli_real_escape_string($conexion, $_POST["caso"]);
	@$sede = mysqli_real_escape_string($conexion, $_POST["codSede"]);
	@$grupo = mysqli_real_escape_string($conexion, $_POST["codGrupo"]);
	@$areas = mysqli_real_escape_string($conexion, $_POST["areas"]);
	@$codEstudiante = mysqli_real_escape_string($conexion, $_POST["codEstudiante"]);
	@$docNominador = mysqli_real_escape_string($conexion, $_POST["docNominador"]);
	@$enunciado = mysqli_real_escape_string($conexion, $_POST["enunciado"]);
	@$tipoCondicion = mysqli_real_escape_string($conexion, $_POST["tipoCondicion"]);

	@$razones = mysqli_real_escape_string($conexion, $_POST["razones"]);
	@$enunciaSubrazon=mysqli_real_escape_string($conexion, $_POST["enunciaSubrazon"]);
	@$idEstudiante = mysqli_real_escape_string($conexion, $_POST["idEstudiante"]);
	@$idArea = mysqli_real_escape_string($conexion, $_POST["idArea"]);
	@$evidencia = mysqli_real_escape_string($conexion, $_POST["enunciaEvidencia"]);
	@$idEstEvdc = mysqli_real_escape_string($conexion, $_POST["idEstEvdc"]);

	@$div = mysqli_real_escape_string($conexion, $_POST["div"]);
	@$reinicio = mysqli_real_escape_string($conexion, $_POST["reinicio"]);


	switch($caso){
		case 1: //Cargar grupo.
			$sql=mysqli_query($conexion,'SELECT * FROM estudiantes WHERE sede='.$sede);
			$respuesta='<option>Grupo...</option>';
			$anterior="";
			while($f=mysqli_fetch_array($sql)){
				$sql2=mysqli_query($conexion,'SELECT * FROM grupos WHERE cod='.$f['grupo']);
				while($f2=mysqli_fetch_array($sql2)){
					$actual=$f2['cod'];
					if($anterior!=$actual){
						$respuesta.= '<option value='.$f2['cod'].'>'.$f2['grupo'].'</option>';
						$anterior=$f2['cod'];
					}else{
						$anterior=$f2['cod'];
					}
				}
			}
			break;
		case 2: //Cargar Estudiante
			$sql=mysqli_query($conexion,'SELECT * FROM estudiantes WHERE grupo='.$grupo);
			$respuesta='<option>Estudiante...</option>';
			while($f=mysqli_fetch_array($sql)){
				$respuesta.= '<option value='.$f['cod'].'>'.$f['apellidos'].' '.$f['nombres'].'</option>';				    
			}
			break;
		case 3: //Cargar enunciado
			$sql=mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$codEstudiante);			
			while($f=mysqli_fetch_array($sql)){
				$respuesta= "Selecciona una área para nominar a ".$f['nombres'];								    
			}
			break;
		case 4: //Cargar asignaturas
			$sql=mysqli_query($conexion,'SELECT DISTINCT areas.cod,areas.area FROM areas INNER JOIN asignacionAcademica INNER JOIN asignaturas ON asignacionAcademica.asignatura=asignaturas.cod AND asignaturas.codArea=areas.cod AND asignacionAcademica.docente='.$docNominador.' AND asignacionAcademica.grupo='.$grupo);
			$respuesta='<option>Área...</option>';
			while($f=mysqli_fetch_array($sql)){
				$respuesta.= '<option value='.$f['cod'].'>'.$f['area'].'</option>';
			}
			break;
		case 5://Cargar enunciado para condiciones
			$sql = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$codEstudiante);
			$condicion="";

			if($tipoCondicion==1){
				$condicion="COGNITIVAS";
			}else if($tipoCondicion==2){
				$condicion="AFECTIVAS";
			}else{
				$condicion="EXPRESIVAS";
			}

			while($f=mysqli_fetch_array($sql)){
				if($f['genero']=='0'){
					$respuesta= "En las siguientes CONDICIONES ".$condicion.", seleccione la intensidad que consideres aplique para ella.";
				}else{
					$respuesta= "En las siguientes CONDICIONES ".$condicion.", seleccione la intensidad que consideres aplique para él.";
				}								    
			}		
			break;
		case 6:
			$sql = mysqli_query($conexion,'SELECT * FROM condiciones WHERE codArea='.$areas.' AND tipoCondicion='.$tipoCondicion);
			$cntF=mysqli_num_rows($sql);
			$respuesta='';
			$cont=1;
			while($f=mysqli_fetch_array($sql)){
				$respuesta.= '
					<form id="cond'.$f["cod"].'" class="formCondiciones">
						<label>'.$cont.'. '.$f['descripcion'].'</label><br>
						<ul class="likert">
							<li>
								<input type="radio" name="likert" id="frec0" value=0 onclick="interpretarResultados(this.id,'.$tipoCondicion.')">
								<label>No hay suficiente evidencia</label>
							</li>
							<li>
								<input type="radio" name="likert" id="frec1" value=1 onclick="interpretarResultados(this.id,'.$tipoCondicion.')">
								<label>Debajo de Su nivel</label>
							</li>
							<li>
								<input type="radio" name="likert" id="frec2" value=2 onclick="interpretarResultados(this.id,'.$tipoCondicion.')">
								<label>Normal para su nivel</label>
							</li>
							<li>
								<input type="radio" name="likert" id="frec3" value=3 onclick="interpretarResultados(this.id,'.$tipoCondicion.')">
								<label>Levemente superior a su nivel</label>
							</li>
							<li>
								<input type="radio" name="likert" id="frec4" value=4 onclick="interpretarResultados(this.id,'.$tipoCondicion.')">
								<label>Muy superior a su nivel</label>
							</li>
						</ul>
					</form>';		
			$cont++;
			}			
			break;		
	}
	

	if($enunciaSubrazon){//revisada(ok)
		$consulta = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$enunciaSubrazon);
		while($fila = mysqli_fetch_array($consulta)){
			$respuesta= "De los siguientes enunciados, ¿cuáles son ciertos para ".$fila['nombres']."?";								    
		}
	}

	if($idEstudiante){
		$subrazonesBD=array();					
		$sql=mysqli_query($conexion,'SELECT DISTINCT idSubrazon FROM evidencias  WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idSubrazon');
		$cntF=mysqli_num_rows($sql);
		if($cntF>0){
			while($f=mysqli_fetch_array($sql)){
				$subrazonesBD[]=$f['idSubrazon'];
			}
		}

		$consulta = mysqli_query($conexion,'SELECT  DISTINCT idRazon FROM evidencias WHERE idEstudiante='.$idEstudiante.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idRazon');
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
		$sql=mysqli_query($conexion,'SELECT DISTINCT idRazon FROM evidencias WHERE idEstudiante='.$idEstEvdc.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' ORDER BY idRazon');
		$respuesta='';
		while($f=mysqli_fetch_array($sql)){
			$sql2 = mysqli_query($conexion,'SELECT * FROM razSug WHERE cod='.$f['idRazon']);
			while($f2 = mysqli_fetch_array($sql2)){
				$respuesta.= $f2['cod'].'. '.$f2['razSug'].'<br>';
				$respuesta.='<div id="evidencias'.$f2['cod'].'" class="evidencia">';
			}
			$sql3=mysqli_query($conexion,'SELECT idSubrazon,evidencia FROM evidencias WHERE idEstudiante='.$idEstEvdc.' AND idArea='.$idArea.' AND docNominador='.$docNominador.' AND idRazon='.$f['idRazon'].' ORDER BY idSubrazon');
			
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