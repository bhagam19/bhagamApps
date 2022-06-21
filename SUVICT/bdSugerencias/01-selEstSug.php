<?php

	if(!isset($_SESSION['usuario'])){
		
		echo 
			'
				<br><br>
				Debes acceder con tu cuenta para poder realizar esta acción.
				<br><br>
			
			';		

	}else{
		
		$codigo=$_SESSION['permiso'];
		if($codigo==1||$codigo==3){

			include('../conexion/datosConexion.php');

			echo '<h1>SUGERIR UN ESTUDIANTE PARA NOMINAR</h1>';

			echo 
				'<form id="formularioSugerencias">
					Sede: <select name="sede" id="sede" onchange="cargarGrupos(this.value,'.$_SESSION['cod'].')">
						<option> Sede... </option>';

					$sql=mysqli_query($conexion, "SELECT * FROM sedes");
					while($fila=mysqli_fetch_array($sql)){

						echo'<option value='.$fila['cod'].'>'.$fila['sede'].'</option>';
						
					}
			echo 
				'
					</select>
	        		<br style="clear:both;">
	        		Grupo:  <select id="grupos" onchange="cargarEstudiantes(this.value,'.$_SESSION['cod'].')"></select>
	        		<br style="clear:both;">
	        		Estudiante: <select id="estudiantes" onchange="cargarAreas(this.value,'.$_SESSION['cod'].')"></select>
	        		<br style="clear:both;">
	        		<br style="clear:both;">

	        	</form>

	        	<div id="seccionArea" style="visibility:hidden">
					<span id="estudiante"></span><br>
	        		Área: <select id="areas" onchange="cargarRazones(estudiantes.value)"></select>		
	        	</div>

	        	<br style="clear:both;">

	        	<div id="seccionRazon" style="visibility:hidden">
					<span id="enunciaRazon"></span><br><br>
	        		<div>
						<form id="razones">							
							
						</form>
	        		</div>		
	        	</div>

	        	<br style="clear:both;">

	        	<div id="guardar" onclick="guardarSugerencia('.$_SESSION['cod'].')">Guardar</div>
	        	<div id="guardar2" onclick="guardarSugerencia('.$_SESSION['cod'].')">Guardar</div>
	        	<div id="finalizar" onclick="guardarSugerencia('.$_SESSION['cod'].')">Finalizar</div>
	        	<div id="mostrarEstSugeridos" onclick="mostrarEstSugeridos()">Mostrar Sugeridos</div>

				<div id="sugHechas">';
					include('03-cargarEstSugNom.php');
				echo'</div>';	
		}
	}
?>