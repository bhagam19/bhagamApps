<?php
	$pagina = isset($_GET['pg']) ? $_GET['pg'] : 'bienvenida.php';		
	if(!isset($_SESSION['usuario'])){
		echo 
			'
				<div class="menuNavegacion"> 	
					<ul class="menu">
						<li><a href="../../index.php" style="text-decoration:none"><img style="width:15px;height:15px" src="../art/volver.png">  Ir a Lista de Proyectos</a></li><br>
						<li onclick="cargarPagina(\'bienvenida.php\')"><img style="width:15px;height:15px" src="../art/home.svg">  Página Inicial</li>
					</ul>				
				</div>
			';		
	}else{
		$codigo=$_SESSION['permiso'];
		if($codigo==3){
			echo 
			'
				<div class="menuNavegacion"> 
					<ul class="menu">						
						<li><a href="../../index.php" style="text-decoration:none"><img style="width:15px;height:15px" src="../art/volver.png">  Ir a Lista de Proyectos</a></li><br>
						<li onclick="cargarPagina(\'bienvenida.php\')"><img style="width:15px;height:15px" src="../art/home.svg">  Página Inicial</li>
						<li onclick="cargarPagina(\'../mostrarTablasenBD.php\')"><img style="width:15px;height:15px" src="../art/bd.svg">  Base de Datos</li>
						<li><img style="width:15px;height:15px" src="../art/administrar.svg">  Administración</li>
							<ul>
								<li onclick="cargarPagina(\'../bdAreas/01-bdAreas.php\')">Áreas</li>
								<li onclick="cargarPagina(\'../bdAsignaturas/01-bdAsignaturas.php\')">Asignaturas</li>
								<li onclick="cargarPagina(\'../bdAsignacionAcademica/01-bdAsignacionAcademica.php\')">Asignación Académica</li>
								<li onclick="cargarPagina(\'../bdDocentes/01-bdDocentes.php\')">Docentes</li>
								<li onclick="cargarPagina(\'../bdEstudiantes/01-bdEstudiantes.php\')">Estudiantes</li>
								<li onclick="cargarPagina(\'../bdGrupos/01-bdGrupos.php\')">Grupos</li>
								<li onclick="cargarPagina(\'../bdNominaciones/11-bdNominaciones.php\')">Nominaciones</li>
								<li onclick="cargarPagina(\'../bdSugerencias/11-bdSugerencias.php\')">Sugerencias</li>
								<li onclick="cargarPagina(\'../bdPermisos/01-bdPermisos.php\')">Permisos</li>
								<li onclick="cargarPagina(\'../bdLogs/02-verLogs.php\')">Ver Visitas</li>
							</ul>
						<li><img style="width:15px;height:15px" src="../art/excel.svg">  Cargar Excel</li>
						<li onClick="reinstalarBD()"><img style="width:15px;height:15px" src="../art/reiniciar.svg">  Reinstalar BD</li>
					</ul>				
				</div>
			';
		}
		if($codigo==1){
			echo 
			'
				<div class="menuNavegacion"> 	
					<ul class="menu">
						<li><a href="../../index.php" style="text-decoration:none"><img style="width:15px;height:15px" src="../art/volver.png">  Ir a Lista de Proyectos</a></li><br>
						<li onclick="cargarPagina(\'bienvenida.php\')"><img style="width:15px;height:15px" src="../art/home.svg">  Página Inicial</li>
					</ul>				
				</div>
			';
		}			
	}		
?>