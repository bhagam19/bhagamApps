<?php
	//session_start();	
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
		'<div id=estNomSesion>
			<span id="tituloEstSugSesion">Estudiantes Nominados por tí.</span>
			<br>
			<div id="cabezaTabla">
				<table class="tablaBDEstNomSesion">
					<thead>
						<tr>
							<td class="encabTablaEstNomSesion">Estudiante</td>
							<td class="encabTablaEstNomSesion">Grupo</td>
							<td class="encabTablaEstNomSesion">Área</td>
							<td class="encabTablaEstNomSesion">Cognitiva</td>		
							<td class="encabTablaEstNomSesion">Afectiva</td>	
							<td class="encabTablaEstNomSesion">Expresiva</td>
							<td class="encabTablaEstNomSesion">Resultado</td>					
						</tr>					
					</thead>
				</table>
			</div>	

			<div id="cuerpoTabla">
				<table class="tablaBDEstNomSesion">
					<thead style="visibility:hidden">
						<tr>
							<td class="encabTablaEstNomSesion">Estudiante</td>
							<td class="encabTablaEstNomSesion">Grupo</td>
							<td class="encabTablaEstNomSesion">Área</td>
							<td class="encabTablaEstNomSesion">Cognitiva</td>		
							<td class="encabTablaEstNomSesion">Afectiva</td>	
							<td class="encabTablaEstNomSesion">Expresiva</td>
							<td class="encabTablaEstNomSesion">Resultado</td>						
						</tr>					
					</thead>
				
					<tbody id="actualizable">
	';				
		// @include('../mayIni.php');
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

		$codigo=$_SESSION['permiso'];
		if($codigo==3){
			$sql=mysqli_query($conexion,'SELECT DISTINCT estNominados.codEstudiante,estNominados.codArea FROM estNominados');
		}else if($codigo==1){
			$sql=mysqli_query($conexion,'SELECT DISTINCT estNominados.codEstudiante,estNominados.codArea FROM asignacionAcademica INNER JOIN asignaturas INNER JOIN estudiantes INNER JOIN estNominados ON asignacionAcademica.asignatura=asignaturas.cod AND asignacionAcademica.grupo=estudiantes.grupo AND asignaturas.codArea=estNominados.codArea AND estNominados.codEstudiante=estudiantes.cod AND asignacionAcademica.docente='.$docNominador.' ORDER BY codEstudiante,codArea');
		}		
		
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
			$sql2=mysqli_query($conexion,'SELECT nombres, apellidos,grupo FROM estudiantes WHERE cod='.$f['codEstudiante']);
			while($f2=mysqli_fetch_array($sql2)){
				$nomEst=$f2['apellidos']." ".$f2['nombres'];
				$sql3=mysqli_query($conexion,'SELECT grupo FROM grupos WHERE cod='.$f2['grupo']);
				while($f3=mysqli_fetch_array($sql3)){
					$grupo=$f3['grupo'];					
				}
			}
			$sql2=mysqli_query($conexion,'SELECT area FROM areas WHERE cod='.$f['codArea']);
			while($f2=mysqli_fetch_array($sql2)){
				$nomArea=$f2['area'];
			}
			$suma=0;
			$sumaCondiciones=0;
			$respuesta.='
				<tr style="cursor:default">
					<td title="'.$nomEst.'">'.$nomEst.'</td>
					<td title="'.$grupo.'">'.$grupo.'</td>
					<td title="'.$nomArea.'">'.$nomArea.'</td>';
			for($i=1;$i<4;$i++){

				if($codigo==3){
					$sql2=mysqli_query($conexion,'SELECT frecCondicion FROM estNominados WHERE codEstudiante='.$f['codEstudiante'].' AND codArea='.$f['codArea'].' AND tipoCondicion='.$i);
				}else if($codigo==1){
					$sql2=mysqli_query($conexion,'SELECT frecCondicion FROM estNominados WHERE codEstudiante='.$f['codEstudiante'].' AND codArea='.$f['codArea'].' AND docNominador='.$docNominador.' AND tipoCondicion='.$i);
				}	

				
				$total=mysqli_num_rows($sql2);
				if($total>0){
					$v0=0;
				    $v1=0;
				    $v2=0;
				    $v3=0;
				    $v4=0;
				    while($f2=mysqli_fetch_array($sql2)){
				    	switch($f2['frecCondicion']){
			                case 0:
			                    $v0++;
			                    break;
			                case 1:
			                    $v1++;
			                    break;
			                case 2:
			                    $v2++;
			                    break;
			                case 3:
			                    $v3++;
			                    break;
			                case 4:
			                    $v4++;
			                    break;
			            }
				    }
				   	$res=round(((($v0*0)+($v1*1)+($v2*2)+($v3*3)+($v4*4))/$total),2);
					$interpretacion="";				
					if($res<0.67){
						$interpretacion="Datos Insuficientes";
						$respuesta.='<td id="tdrazones" style="background:hsl('.(($res*128)/4).', 100%, 50%)" title="'.$res.'='.$interpretacion.'" onClick="">D.I.</td>';				        
				    }else if($res<1.33){
				        $interpretacion="No tiene la Condición";
						$respuesta.='<td id="tdrazones" style="background:hsl('.(($res*128)/4).', 100%, 50%)" title="'.$res.'='.$interpretacion.'" onClick="">N.C.</td>';
				    }else if($res<2){
				        $interpretacion="No Probable";
						$respuesta.='<td id="tdrazones" style="background:hsl('.(($res*128)/4).', 100%, 50%)" title="'.$res.'='.$interpretacion.'" onClick="">N.P.</td>';
				    }else if($res<2.67){
				    	$interpretacion="Sí Probable";
						$respuesta.='<td id="tdrazones" style="background:hsl('.(($res*128)/4).', 100%, 50%)" title="'.$res.'='.$interpretacion.'" onClick="">S.P.</td>';
						$suma=($suma+$res);
				    	$sumaCondiciones++;				        
				    }else if($res<3.33){
				    	$interpretacion="Sí Tiene la Condición";
						$respuesta.='<td id="tdrazones" style="background:hsl('.(($res*128)/4).', 100%, 50%)" title="'.$res.'='.$interpretacion.'" onClick="">S.C.</td>';
						$suma=($suma+$res);
				    	$sumaCondiciones++;				        
				    }else{
				    	$interpretacion="Sí Tiene la Condición en Alto Grado";
						$respuesta.='<td id="tdrazones" style="background:hsl('.(($res*128)/4).', 100%, 50%)" title="'.$res.'='.$interpretacion.'" onClick="">S.A.G.</td>';
						$suma=($suma+$res);
				    	$sumaCondiciones++;				        
				    }
				}				
			}

			if($sumaCondiciones==2){
				if($suma<5.35){
					$interpretacion="Talento Potencial Probable";
					$respuesta.='<td id="tdrazones" style="background:hsl('.(($suma*128)/8).', 100%, 50%)" title="'.$suma.'='.$interpretacion.'" onClick="">T.Po.Pr.</td>';
				}else if($suma<6.67){
					$interpretacion="Talento Potencial";
					$respuesta.='<td id="tdrazones" style="background:hsl('.(($suma*128)/8).', 100%, 50%)" title="'.$suma.'='.$interpretacion.'" onClick="">T.Po.</td>';
				}else{
					$interpretacion="Talento Potencial Alto";
					$respuesta.='<td id="tdrazones" style="background:hsl('.(($suma*128)/8).', 100%, 50%)" title="'.$suma.'='.$interpretacion.'" onClick="">T.Po.Al</td>';
				}
			}else if($sumaCondiciones==3){
				if($suma<8.03){
					$interpretacion="Talento Probable";
					$respuesta.='<td id="tdrazones" style="background:hsl('.(($suma*128)/12).', 100%, 50%)" title="'.$suma.'='.$interpretacion.'" onClick="">T.Pr.</td>';
				}else if($suma<10.01){
					$interpretacion="Talento";
					$respuesta.='<td id="tdrazones" style="background:hsl('.(($suma*128)/12).', 100%, 50%)" title="'.$suma.'='.$interpretacion.'" onClick="">T.</td>';
				}else{
					$interpretacion="Talento Alto";
					$respuesta.='<td id="tdrazones" style="background:hsl('.(($suma*128)/12).', 100%, 50%)" title="'.$suma.'='.$interpretacion.'" onClick="">T.Al</td>';
				}
			}
						
			$respuesta.='</tr>';
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