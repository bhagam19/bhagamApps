<?php
	
	$paginaLogs="../bdAsignacionAcademica/01-bdAsignacionAcademica";//para escribir los Logs
	$linkLogs="AsignacionAcademica";//para escribir los Logs
	//include('../bdLogs/01-bdEscribirLogs.php');

	if(!isset($_SESSION['usuario'])){
		
		echo 
			'
				Lo siento. No tienes permisos suficientes.<br><br>
				Si crees que deberías poder ingresar a esta opción, ponte en contacto con el administrador.
				<br><br>
			
			';		

	}else{
		
		$codigo=$_SESSION['permiso'];
		if($codigo==3){

			echo 	
			'
				<div id="baseDeDatos">
					<div class="baseDeDatos">
						<h1> <span id="tituloBD">ASIGNACIÓN ACADÉMICA</span> </h1>
						<br><br>
						<br><br>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarAsignacionAcademica(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarAsignacionAcademica(1,\'cod\')"/></td>
									<td class="encabezadoTabla">DOCENTE <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarAsignacionAcademica(0,\'docente\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarAsignacionAcademica(1,\'docente\')"/></td>
									<td class="encabezadoTabla">ASIGNATURA <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarAsignacionAcademica(0,\'asignatura\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarAsignacionAcademica(1,\'asignatura\')"/></td>
									<td class="encabezadoTabla">GRUPO <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarAsignacionAcademica(0,\'grupo\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarAsignacionAcademica(1,\'grupo\')"/></td>
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarAsignacionAcademica.php');

			echo 

			'				</tbody>	
						</table>
					</div>
					
					<div id="menuAcciones">
						<div id="ttlBtnAc" onclick="cargarPagina(\'../bdAsignacionAcademica/cargarAsignacionAcademicaBD.php\')">
							Cargar Asignacion
						</div>
					</div>
				</div>
				<div id="volverArriba" onclick="volverArriba()">Volver Arriba</div>
			';			
		}

	}
?>