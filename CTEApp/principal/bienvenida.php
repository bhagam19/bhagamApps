<?php
	if(isset($_SESSION['usuario'])){
		echo'
			<h1>BIENVENIDO</h1>
			<br>
			<div id="pregunta">
				¿Qué deseas hacer?
			</div>
			<br><br>
			<div id="paraCentrar">';
				$datosApp=array(
							array("../bdNominaciones/01-selEstNom.php","https://sites.google.com/site/inedutaparto/home/identificar-talento.jpg","Nominar los Talentos de un Estudiante"),
							array("../bdSugerencias/01-selEstSug.php","https://sites.google.com/site/inedutaparto/home/sugerir.jpg","Sugerir Estudiantes para ser Nominados en otras Áreas")
						);
				foreach ($datosApp as $App){
					echo'
							<div id="boton" onclick="cargarPagina(\''.$App[0].'\');">
								<a>
									<img src='.$App[1].'>	
									<p>'.$App[2].'</p>
								</a>
							</div>
						';
				}

		echo '</div>';

	}
?>