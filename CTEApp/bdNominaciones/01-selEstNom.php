<?php
	include('../conexion/datosConexion.php');
	if(!isset($_SESSION['usuario'])){
		echo'
			<br><br>Debes acceder con tu cuenta para poder realizar esta acción.<br><br>
		';
	}else{	
		echo '<h1>NOMINAR A UN ESTUDIANTE</h1>';	
		$codigo=$_SESSION['permiso'];
		if($codigo==3){
		//============SEDES==============
			$sedes=mysqli_query($conexion,'SELECT DISTINCT estudiantes.sede FROM estudiantes');
			$cntSedes=mysqli_num_rows($sedes);
			echo '<form id="formularioSugerencias">
					Sede: <select name="sede" id="sede" onchange="cargarGruposNom(this.value,13)">
							<option>Sede...</option>
	        	';
			while($f=mysqli_fetch_array($sedes)){
				$sql=mysqli_query($conexion, "SELECT * FROM sedes WHERE cod=".$f['sede']);
				while($f2=mysqli_fetch_array($sql)){
					echo '<option value='.$f2['cod'].'>'.$f2['sede'].'</option>';
				}
			}
			echo'</select>';
			echo'<br style="clear:both;">';
		//============GRUPOS Y ESTUDIANTES==============
			echo'
					Grupo: <select id="grupos" onchange="cargarEstudiantesNom(this.value,'.$_SESSION['cod'].')"></select>
				';
			echo'<br style="clear:both;">';		
			echo'
        		Estudiante: <select id="estudiantes" onchange="cargarAreasNom(this.value,12)"></select>
        	';

		}else if($codigo==1){			
		//============SEDES==============
			$sedes=mysqli_query($conexion,'SELECT DISTINCT estudiantes.sede FROM estudiantes INNER JOIN asignacionAcademica ON estudiantes.grupo=asignacionAcademica.grupo WHERE asignacionAcademica.docente='.$_SESSION['cod']);
			$cntSedes=mysqli_num_rows($sedes);
			if($cntSedes==1){
				while($f=mysqli_fetch_array($sedes)){
					$sql=mysqli_query($conexion, "SELECT * FROM sedes WHERE cod=".$f['sede']);
					while($f2=mysqli_fetch_array($sql)){
						echo '
							<form id="formularioSugerencias">
								Sede: <select name="sede" id="sede">
									<option value='.$f2['cod'].'>'.$f2['sede'].'</option>
								</select>
						';										
					}
				}
			}else if($cntSedes>1){
				echo '<form id="formularioSugerencias">
					Sede: <select name="sede" id="sede" onchange="cargarGruposNom(this.value,'.$_SESSION['cod'].')">
	        	';
				while($f=mysqli_fetch_array($sedes)){
					$sql=mysqli_query($conexion, "SELECT * FROM sedes WHERE cod=".$f['sede']);
					while($f2=mysqli_fetch_array($sql)){
						echo '<option value='.$f2['cod'].'>'.$f2['sede'].'</option>';
					}
				}
				echo'</select>';
			}
			echo'<br style="clear:both;">';
		//============GRUPOS Y ESTUDIANTES==============
			$grupos=mysqli_query($conexion,'SELECT DISTINCT estudiantes.grupo FROM estudiantes INNER JOIN asignacionAcademica ON estudiantes.grupo=asignacionAcademica.grupo WHERE asignacionAcademica.docente='.$_SESSION['cod'].' ORDER BY grupo');
			$cntGrupos=mysqli_num_rows($grupos);
			$grupo="";
			if($cntGrupos==1){
				while($f=mysqli_fetch_array($grupos)){
					$sql=mysqli_query($conexion, "SELECT * FROM grupos WHERE cod=".$f['grupo']);
					while($f2=mysqli_fetch_array($sql)){
						$grupo=$f2['cod'];
						echo '
							Grupo: <select name="grupos" id="grupos">
								<option value='.$f2['cod'].'>'.$f2['grupo'].'</option>
							</select>
						';
					}
				}
				echo'<br style="clear:both;">';
				echo'
					Estudiante: <select id="estudiantes" onchange="cargarAreasNom(this.value,'.$_SESSION['cod'].')">
				';
				$sql=mysqli_query($conexion,'SELECT * FROM estudiantes WHERE grupo='.$grupo);
				echo'<option>Estudiante...</option>';
				while($row = mysqli_fetch_array($sql)){
					echo '<option value='.$row['cod'].'>'.$row['apellidos'].' '.$row['nombres'].'</option>';				    
				}
				echo'</select>';
			}else if($cntGrupos>1){
				echo'
					Grupo: <select name="grupos" id="grupos" onchange="cargarEstudiantesNom(this.value,'.$_SESSION['cod'].')">
						<option> Grupo... </option>';
				while($f=mysqli_fetch_array($grupos)){
					$sql=mysqli_query($conexion, "SELECT * FROM grupos WHERE cod=".$f['grupo']);
					while($f2=mysqli_fetch_array($sql)){
						echo '<option value='.$f2['cod'].'>'.$f2['grupo'].'</option>';										
					}
				}
				echo'</select>';
				echo'<br style="clear:both;">';
				echo'
	        		Estudiante: <select id="estudiantes" onchange="cargarAreasNom(this.value,'.$_SESSION['cod'].')"></select>
	        	';
			}
		}
			echo'<br style="clear:both;">';
			echo'<br style="clear:both;">
				</form>';

		//============ASIGNATURA==============			
			echo'
				<div id="seccionArea" style="visibility:hidden">
					<span id="estudiante"></span><br>
	        		Área: <select id="areas" onchange="cargarCondiciones(estudiantes.value,1)"></select>		
	        	</div>

	        	<br style="clear:both;">
	        	';

	  	//============CONDICIONES==============	
	      	echo'
	        	<div id="seccionRazon" style="visibility:hidden">
					<span id="enunciaRazon"></span><br><br>
	        		<div>
						<div id="razones">							
							
						</div>
	        		</div>		
	        	</div>

	        	<br style="clear:both;">

	        	<div id="guardar" onclick="guardarNominaciones('.$_SESSION['cod'].',1)">Continuar</div>
	        	<div id="guardar2" onclick="guardarNominaciones('.$_SESSION['cod'].',2)">Continuar</div>
	        	<div id="finalizar" onclick="guardarNominaciones('.$_SESSION['cod'].',3)">Finalizar</div>
	        	<div id="mostrarEstSugeridos" onclick="mostrarEstSugeridos()">Mostrar Sugeridos</div>

				<div id="resultados" style="visibility:hidden"></div>
				<div id="grafica" style="visibility:hidden"></div>
				<div id="interpretacion" style="visibility:hidden"></div>

				<div id="sugHechas">';
					include('03-cargarEstSug.php');
			echo'
				</div>

				<div id="nomHechas">';
					include('04-cargarEstNom.php');
			echo'</div>';				
	}
?>