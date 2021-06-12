<?php
	// @session_start();	
	include('../conexion/datosConexion.php');
	@$docNominador= mysqli_real_escape_string($conexion, $_POST["docNominador"]);
	if(!$docNominador){
		@session_start();
		$docNominador=$_SESSION['cod'];
	}
	@$codSede = mysqli_real_escape_string($conexion, $_POST["codSede"]);	
	@$codGrupo = mysqli_real_escape_string($conexion, $_POST["codGrupo"]);
	@$idArea = mysqli_real_escape_string($conexion, $_POST["idArea"]);
	@$idEstudiante = mysqli_real_escape_string($conexion, $_POST["idEstudiante"]);
	$respuesta='';
	$respuesta.=
		'<div id=estSugSesion>
			<span id="tituloEstSugSesion">Otros Docentes te Hacen estas Sugerencias</span>
			<br>
			<div id="cabezaTabla">
				<table class="tablaBDEstSugSesion">
					<thead>
						<tr>
							<td class="encabTablaEstSugSesion">Estudiante</td>
							<td class="encabTablaEstSugSesion">Grupo</td>
							<td class="encabTablaEstSugSesion">Área</td>
							<td class="encabTablaEstSugSesion">Razones</td>		
							<td class="encabTablaEstSugSesion">Argumentos</td>							
						</tr>					
					</thead>
				</table>
			</div>

			<div id="cuerpoTabla">
				<table class="tablaBDEstSugSesion">
					<thead style="visibility:hidden">
						<tr>
							<td class="encabTablaEstSugSesion">Estudiante</td>
							<td class="encabTablaEstSugSesion">Grupo</td>
							<td class="encabTablaEstSugSesion">Área</td>
							<td class="encabTablaEstSugSesion">Razones</td>		
							<td class="encabTablaEstSugSesion">Argumentos</td>							
						</tr>					
					</thead>

					<tbody id="actualizable">
	';				
		include('../mayIni.php');
		$estudiantes=array();
		$estudiante="";
		$grupo='';
		$areas=array();
		$area='';		
		$razones="";
		$titleRazones="";
		$subrazones="";
		$titleSubrazones="";

		$grupos=array();
		$asignaturas=array();
		$areas=array();
		$sql=mysqli_query($conexion,'SELECT DISTINCT estSugeridos.idEstudiante,estSugeridos.idArea FROM asignacionAcademica INNER JOIN asignaturas INNER JOIN estudiantes INNER JOIN estSugeridos ON asignacionAcademica.asignatura=asignaturas.cod AND asignacionAcademica.grupo=estudiantes.grupo AND asignaturas.codArea=estSugeridos.idArea AND estSugeridos.idEstudiante=estudiantes.cod AND asignacionAcademica.docente='.$docNominador);
		
		// $sql=mysqli_query($conexion, 'SELECT DISTINCT idEstudiante FROM estSugeridos');
		// while($f=mysqli_fetch_array($sql)){
		// 	$estudiantes[]=$f['idEstudiante'];
		// }

		// if($idSede){
		// 	$estudiantes=array();
		// 	$sql=mysqli_query($conexion, 'SELECT DISTINCT estSugeridos.idEstudiante FROM estSugeridos INNER JOIN estudiantes ON estSugeridos.idEstudiante=estudiantes.cod WHERE estudiantes.sede='.$idSede);
		// 	while($f=mysqli_fetch_array($sql)){
		// 		$estudiantes[]=$f['idEstudiante'];
		// 	}
		// }
		// if($idGrupo){
		// 	$estudiantes=array();
		// 	$sql=mysqli_query($conexion, 'SELECT DISTINCT estSugeridos.idEstudiante FROM estSugeridos INNER JOIN estudiantes ON estSugeridos.idEstudiante=estudiantes.cod WHERE estudiantes.grupo='.$idGrupo);
		// 	while($f=mysqli_fetch_array($sql)){
		// 		$estudiantes[]=$f['idEstudiante'];
		// 	}
		// }
		// if($idEstudiante){
		// 	$estudiantes=array();
		// 	$sql=mysqli_query($conexion, 'SELECT DISTINCT idEstudiante FROM estSugeridos WHERE idEstudiante='.$idEstudiante);
		// 	while($f=mysqli_fetch_array($sql)){
		// 		$estudiantes[]=$f['idEstudiante'];
		// 	}
		// }

		while($f=mysqli_fetch_array($sql)){
			// echo $f['idEstudiante']." || ".$f['idArea']." <br>";
			$sql2=mysqli_query($conexion,'SELECT nombres, apellidos,grupo FROM estudiantes WHERE cod='.$f['idEstudiante']);
			while($f2=mysqli_fetch_array($sql2)){
				$nomEst=$f2['apellidos']." ".$f2['nombres'];
				$sql3=mysqli_query($conexion,'SELECT grupo FROM grupos WHERE cod='.$f2['grupo']);
				while($f3=mysqli_fetch_array($sql3)){
					$grupo=$f3['grupo'];					
				}
			}

			$sql2=mysqli_query($conexion,'SELECT area FROM areas WHERE cod='.$f['idArea']);
			while($f2=mysqli_fetch_array($sql2)){
				$nomArea=mayIni($f2['area']);
			}

			$sql3=mysqli_query($conexion,'SELECT DISTINCT idRazon FROM estSugeridos WHERE idEstudiante='.$f['idEstudiante'].' AND idArea='.$f['idArea'].' ORDER BY idrazon');
			while($f3=mysqli_fetch_array($sql3)){
				$sql4=mysqli_query($conexion,'SELECT * FROM razSug WHERE cod='.$f3['idRazon']);
				while($f4=mysqli_fetch_array($sql4)){
					if($razones==""){
						$razones=$f4['cod'];
						$titleRazones=$f4['cod'].". ".$f4['razSug']." \n\n ";
					}else{
						$razones.=", ".$f4['cod'];
						$titleRazones.=$f4['cod'].". ".$f4['razSug']." \n\n ";
					}
				}						
			}

			$sql4=mysqli_query($conexion,'SELECT DISTINCT idSubrazon FROM estSugeridos WHERE idEstudiante='.$f['idEstudiante'].' AND idArea='.$f['idArea'].' ORDER BY idSubrazon');
			while($f4=mysqli_fetch_array($sql4)){
				if($f4['idSubrazon']==""){
					$subrazones="";
					$titleSubrazones="";
				}else{
					$sql5=mysqli_query($conexion,'SELECT * FROM subrazones WHERE cod='.$f4['idSubrazon']);
					while($f5=mysqli_fetch_array($sql5)){
						if($subrazones==""){
							$subrazones=$f5['cod'];
							$titleSubrazones=$f5['cod'].". ".$f5['subrazon']." \n\n ";
						}else{
							$subrazones.=", ".$f5['cod'];
							$titleSubrazones.=$f5['cod'].". ".$f5['subrazon']." \n\n ";
						}
					}
				}														
			}
			$respuesta.='
				<tr style="cursor:default">
					<td title="'.$nomEst.'">'.$nomEst.'</td>
					<td title="'.$grupo.'">'.$grupo.'</td>
					<td title="'.$nomArea.'">'.$nomArea.'</td>
					<td id="tdrazones" title="'.$titleRazones.'" onClick="cargarSugxModificar('.$estudiante.','.$docNominador.','.$area.',8)">'.$razones.'</td>
					<td id="tdrazones" title="'.$titleSubrazones.'" onClick="cargarSugxModificar('.$estudiante.','.$docNominador.','.$area.',9)">'.$subrazones.'</td>
				</tr>
			';
			$razones="";
			$titleRazones="";
			$subrazones="";
			$titleSubrazones="";				
		}	

$respuesta.='			
				</tbody>	
			</table>
			</div>
		</div>
';
echo $respuesta;
?>