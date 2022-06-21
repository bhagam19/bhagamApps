<?php
	
	$paginaLogs="../bdEstudiantes/01-bdEstudiantes";//para escribir los Logs
	$linkLogs="Estudiantes";//para escribir los Logs
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
						<H1><span id="tituloBD">Estudiantes</span></H1>
						<br><br><br><br>';

						//include('01.02-cargarFiladeFiltros.php');
			echo'				
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'cod\')"/></td>
									<td class="encabezadoTabla">IDENTIFICACIÓN <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'ID\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'ID\')"/></td>
									<td class="encabezadoTabla">APELLIDOS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'apellidos\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'apellidos\')"/></td>
									<td class="encabezadoTabla">NOMBRES <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'nombres\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'nombres\')"/></td>
									<td class="encabezadoTabla">GEN. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'genero\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'genero\')"/></td>
									<td class="encabezadoTabla">SEDE <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'sede\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'sede\')"/></td>
									<td class="encabezadoTabla">GRUPO <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'grupo\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'grupo\')"/></td>
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarEstudiantes.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
				<div id="menuAcciones">
					<div id="ttlBtnAc" onclick="cargarPagina(\'../bdEstudiantes/cargarEstudiantesBD.php\')">
						Cargar Estudiantes
					</div>
				</div>
				<div id="volverArriba" onclick="volverArriba()">Volver Arriba</div>
			';			
		}

	}
?>