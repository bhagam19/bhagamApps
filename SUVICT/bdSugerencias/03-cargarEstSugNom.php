<?php
	// @session_start();	
	include('../conexion/datosConexion.php');
	@$docNominador= mysqli_real_escape_string($conexion, $_POST["docNominador"]);
	if(!$docNominador){
		@session_start();
		$docNominador=$_SESSION['cod'];
	}
	@$idSede = mysqli_real_escape_string($conexion, $_POST["idSede"]);	
	@$idGrupo = mysqli_real_escape_string($conexion, $_POST["idGrupo"]);
	@$idArea = mysqli_real_escape_string($conexion, $_POST["idArea"]);
	@$idEstudiante = mysqli_real_escape_string($conexion, $_POST["idEstudiante"]);
	$respuesta='';
	$respuesta.=
		'<div id=estSugSesion>
			<span id="tituloEstSugSesion">Estudiantes Sugeridos Por Tí</span>
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




		$sql=mysqli_query($conexion, 'SELECT DISTINCT idEstudiante FROM estSugeridos WHERE docNominador='.$docNominador);
		while($f=mysqli_fetch_array($sql)){
			$estudiantes[]=$f['idEstudiante'];
		}
		if($idSede){
			$estudiantes=array();
			$sql=mysqli_query($conexion, 'SELECT DISTINCT estSugeridos.idEstudiante FROM estSugeridos INNER JOIN estudiantes ON estSugeridos.idEstudiante=estudiantes.cod WHERE estudiantes.sede='.$idSede.' AND docNominador='.$docNominador);
			while($f=mysqli_fetch_array($sql)){
				$estudiantes[]=$f['idEstudiante'];
			}
		}
		if($idGrupo){
			$estudiantes=array();
			$sql=mysqli_query($conexion, 'SELECT DISTINCT estSugeridos.idEstudiante FROM estSugeridos INNER JOIN estudiantes ON estSugeridos.idEstudiante=estudiantes.cod WHERE estudiantes.grupo='.$idGrupo.' AND docNominador='.$docNominador);
			while($f=mysqli_fetch_array($sql)){
				$estudiantes[]=$f['idEstudiante'];
			}
		}
		if($idEstudiante){
			$estudiantes=array();
			$sql=mysqli_query($conexion, 'SELECT DISTINCT idEstudiante FROM estSugeridos WHERE idEstudiante='.$idEstudiante);
			while($f=mysqli_fetch_array($sql)){
				$estudiantes[]=$f['idEstudiante'];
			}
		}

		foreach ($estudiantes as $estudiante) {
			$sql=mysqli_query($conexion,'SELECT nombres, apellidos,grupo FROM estudiantes WHERE cod='.$estudiante);
			while($f=mysqli_fetch_array($sql)){
				$nomEst=$f['apellidos']." ".$f['nombres'];
				$sql2=mysqli_query($conexion,'SELECT grupo FROM grupos WHERE cod='.$f['grupo']);
				while($f2=mysqli_fetch_array($sql2)){
					$grupo=$f2['grupo'];					
				}
			}
			$sql2=mysqli_query($conexion,'SELECT DISTINCT idArea FROM estSugeridos WHERE idEstudiante='.$estudiante.' ORDER BY idArea');
			while($f2=mysqli_fetch_array($sql2)){
				$areas[]=$f2['idArea'];
				foreach($areas as $area){
					$sql3=mysqli_query($conexion,'SELECT area FROM areas WHERE cod='.$area);
					while($f3=mysqli_fetch_array($sql3)){
						$nomArea=mayIni($f3['area']);
					}
					$sql4=mysqli_query($conexion,'SELECT DISTINCT idRazon FROM estSugeridos WHERE idEstudiante='.$estudiante.' AND idArea='.$area.' ORDER BY idrazon');
					while($f4=mysqli_fetch_array($sql4)){
						$sql5=mysqli_query($conexion,'SELECT * FROM razSug WHERE cod='.$f4['idRazon']);
						while($f5=mysqli_fetch_array($sql5)){
							if($razones==""){
								$razones=$f5['cod'];
								$titleRazones=$f5['cod'].". ".$f5['razSug']." \n\n ";
							}else{
								$razones.=", ".$f5['cod'];
								$titleRazones.=$f5['cod'].". ".$f5['razSug']." \n\n ";
							}
						}						
					}
					$sql6=mysqli_query($conexion,'SELECT DISTINCT idSubrazon FROM estSugeridos WHERE idEstudiante='.$estudiante.' AND idArea='.$area.' ORDER BY idSubrazon');
							while($f6=mysqli_fetch_array($sql6)){
								if($f6['idSubrazon']==""){
									$subrazones="";
									$titleSubrazones="";
								}else{
									$sql7=mysqli_query($conexion,'SELECT * FROM subrazones WHERE cod='.$f6['idSubrazon']);
									while($f7=mysqli_fetch_array($sql7)){
										if($subrazones==""){
											$subrazones=$f7['cod'];
											$titleSubrazones=$f7['cod'].". ".$f7['subrazon']." \n\n ";
										}else{
											$subrazones.=", ".$f7['cod'];
											$titleSubrazones.=$f7['cod'].". ".$f7['subrazon']." \n\n ";
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
				$areas=array();	
			}	
		}	

$respuesta.='			
				</tbody>	
			</table>
			</div>
		</div>
';
echo $respuesta;
?>