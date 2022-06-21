<?php
	
	$paginaLogs="../bdAsignaturas/01-bdAsignaturas";//para escribir los Logs
	$linkLogs="Asignaturas";//para escribir los Logs
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
						<h1><span id="tituloBD">ASIGNATURAS</span></h1>
						<br><br><br><br>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarAsignatura(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarAsignatura(1,\'cod\')"/></td>
									<td class="encabezadoTabla">ASIGNATURAS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarAsignatura(0,\'asignatura\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarAsignatura(1,\'asignatura\')"/></td>
									<td class="encabezadoTabla">ÁREAS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarAsignatura(0,\'codArea\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarAsignatura(1,\'codArea\')"/></td>
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarAsignaturas.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
				<div id="menuAcciones">
					<div id="ttlBtnAc" onclick="cargarPagina(\'../bdAsignaturas/cargarAsignaturasBD.php\')">
						Cargar Asignaturas
					</div>
				</div>
				<div id="volverArriba" onclick="volverArriba()">Volver Arriba</div>
			';			
		}

	}
?>