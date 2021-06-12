<?php
	include('../conexion/datosConexion.php');
	@$cnt=mysqli_real_escape_string($conexion,$_POST['cnt']);
	@$cod=mysqli_real_escape_string($conexion,$_POST['cod']);
	@$sede=mysqli_real_escape_string($conexion,$_POST['sede']);
	@$grupo=mysqli_real_escape_string($conexion,$_POST['grupo']);
	@$estudiante=mysqli_real_escape_string($conexion,$_POST['estudiante']);
	@$area=mysqli_real_escape_string($conexion,$_POST['area']);
	@$docNominador=mysqli_real_escape_string($conexion,$_POST['docNominador']);
	$respuesta="";
	switch ($cnt) {
		case 1: //Sede
			$consulta=mysqli_query($conexion,"SELECT DISTINCT idEstudiante FROM evidencias WHERE idEstudiante=".$cod);
			while($fila=mysqli_fetch_array($consulta)){
				$consulta2=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE cod=".$fila['idEstudiante']);
				while($fila2=mysqli_fetch_array($consulta2)){
					$consulta3=mysqli_query($conexion,"SELECT * FROM sedes WHERE cod=".$fila2['sede']);
					$sedeSelec="";
					while($fila3=mysqli_fetch_array($consulta3)){
						$sedeSelec=$fila3['cod'];
						$respuesta.='<option value='.$fila3['cod'].'>'.$fila3['sede'].'</option>';					
					}
					$consulta3=mysqli_query($conexion,"SELECT * FROM sedes");
					while($fila3=mysqli_fetch_array($consulta3)){
						if($sedeSelec!=$fila3['cod']){
							$respuesta.='<option value='.$fila3['cod'].'>'.$fila3['sede'].'</option>';
						}											
					}
				}
			}
			break;
		case 2: // Grupo
			$grupoSel="";
			$consulta=mysqli_query($conexion,"SELECT DISTINCT idEstudiante FROM evidencias WHERE idEstudiante=".$cod);
			while($fila=mysqli_fetch_array($consulta)){
				$consulta2=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE cod=".$fila['idEstudiante']);
				while($fila2=mysqli_fetch_array($consulta2)){
					$consulta3=mysqli_query($conexion,"SELECT * FROM grupos WHERE cod=".$fila2['grupo']);
					while($fila3=mysqli_fetch_array($consulta3)){
						$grupoSel=$fila3['cod'];
						$respuesta.='<option value='.$fila3['cod'].'>'.$fila3['grupo'].'</option>';
					}
				}					
			}
			$anterior="";
			$consulta=mysqli_query($conexion,'SELECT * FROM estudiantes WHERE sede='.$sede);
			while($fila=mysqli_fetch_array($consulta)){
				$consulta2=mysqli_query($conexion,'SELECT * FROM grupos WHERE cod='.$fila['grupo']);
				while($fila2=mysqli_fetch_array($consulta2)){
					if($grupoSel!=$fila2['cod']){
						$actual=$fila2['cod'];
						if($anterior!=$actual){
							$respuesta.= '<option value='.$fila2['cod'].'>'.$fila2['grupo'].'</option>';	
							$anterior=$fila2['cod'];
						}else{
							$anterior=$fila2['cod'];
						}
					}
														
				}			    
			}
			break;
		case 3: // Estudiante
			$estSel="";
			$consulta=mysqli_query($conexion,"SELECT DISTINCT idEstudiante FROM evidencias WHERE idEstudiante=".$cod);
			while($fila=mysqli_fetch_array($consulta)){
				$consulta2=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE cod=".$fila['idEstudiante']);
				while($fila2=mysqli_fetch_array($consulta2)){
					$estSel=$fila2['cod'];
					$respuesta.='<option value='.$fila2['cod'].'>'.$fila2['apellidos'].' '.$fila2['nombres'].'</option>';
				}					
			}
			$anterior="";
			$consulta=mysqli_query($conexion,'SELECT * FROM estudiantes WHERE grupo='.$grupo);
			while($fila=mysqli_fetch_array($consulta)){
				if($estSel!=$fila['cod']){
					$actual=$fila['cod'];
					if($anterior!=$actual){
						$respuesta.='<option value='.$fila['cod'].'>'.$fila['apellidos'].' '.$fila['nombres'].'</option>';	
						$anterior=$fila['cod'];
					}else{
						$anterior=$fila['cod'];
					}
				}		    
			}
			break;
		case 4: //Enunciado área
			$consulta = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$estudiante);
			while($fila = mysqli_fetch_array($consulta)){
				if($fila['genero']=='0'){
					$respuesta= "¿En qué área consideras que ".$fila['nombres']." deber ser nominada?";
				}else{
					$respuesta= "¿En qué área consideras que ".$fila['nombres']." deber ser nominado?";
				}								    
			}
			break;
		case 5: //Área
			$areaSel="";
			$consulta2=mysqli_query($conexion,"SELECT * FROM areas WHERE cod=".$area);
			while($fila2=mysqli_fetch_array($consulta2)){
				$areaSel=$fila2['cod'];
				$respuesta.='<option value='.$fila2['cod'].'>'.$fila2['area'].'</option>';
			}
			$anterior="";
			$consulta=mysqli_query($conexion,"SELECT * FROM areas");
				while($fila=mysqli_fetch_array($consulta)){
					if($areaSel!=$fila['cod']){
						$respuesta.='<option value='.$fila['cod'].'>'.$fila['area'].'</option>';
					}										
				}
			break;
		case 6: //razones
			$consulta = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$estudiante);
			while($fila = mysqli_fetch_array($consulta)){
				if($fila['genero']=='0'){
					$respuesta= "¿Por qué consideras que ella deba ser nominada en esta área?";
				}else{
					$respuesta= "¿Por qué consideras que él deba ser nominado en esta área?";
				}								    
			}
			break;
		case 7:
			$consulta = mysqli_query($conexion,'SELECT * FROM estudiantes WHERE cod='.$estudiante);
			while($fila = mysqli_fetch_array($consulta)){
				$respuesta= "De los siguientes enunciados, ¿cuáles son ciertos para ".$fila['nombres'];								    
			}
			break;
		case 8:
			$razones=array();
			$consulta=mysqli_query($conexion,'SELECT DISTINCT idRazon FROM evidencias WHERE idEstudiante='.$estudiante.' AND idArea='.$area.' AND docNominador='.$docNominador);
			while($fila = mysqli_fetch_array($consulta)){
				$razones[]=$fila['idRazon'];
			}
			$consulta = mysqli_query($conexion,'SELECT * FROM razSug');
			while($fila = mysqli_fetch_array($consulta)){
				if(in_array($fila['cod'], $razones)){
					$respuesta.= '<div id="divRazon'.$fila["cod"].'" class="divRazon"><input type="checkbox" checked id="razon'.$fila["cod"].'" value='.$fila['cod'].' onclick="mostrarGuardar()">'.$fila['razSug'].'<br><br></div>';
				}else{
					$respuesta.= '<div id="divRazon'.$fila["cod"].'" class="divRazon"><input type="checkbox" id="razon'.$fila["cod"].'" value='.$fila['cod'].' onclick="mostrarGuardar()">'.$fila['razSug'].'<br><br></div>';
				}
						    
			}
			break;
		case 9:
			$subrazonesBD=array();					
			$sql=mysqli_query($conexion,'SELECT DISTINCT idSubrazon FROM evidencias  WHERE idEstudiante='.$estudiante.' AND idArea='.$area.' AND docNominador='.$docNominador.' ORDER BY idSubrazon');
			$cntF=mysqli_num_rows($sql);
			if($cntF>0){
				while($f=mysqli_fetch_array($sql)){
					$subrazonesBD[]=$f['idSubrazon'];
				}
			}

			$consulta = mysqli_query($conexion,'SELECT  DISTINCT idRazon FROM evidencias WHERE idEstudiante='.$estudiante.' AND idArea='.$area.' AND docNominador='.$docNominador.' ORDER BY idRazon');
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
			break;
	}	
	echo $respuesta;
?>