<?php
	
	$paginaLogs="../bdPermisos/01-bdPermisos";//para escribir los Logs
	$linkLogs="Permisos";//para escribir los Logs
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
						<span id="tituloBD">SUGERENCIAS REALIZADAS</span>
						<br><br>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'cod\')"/><br>COD.</td>
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'docNominador\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'docNominador\')"/><br>DOCENTE NOMINADOR</td>
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'idEstudiante\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'idEstudiante\')"/><br>NOMBRE DEL ESTUDIANTE</td>
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'idEstudiante\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'idEstudiante\')"/><br>GRUPO</td>
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'idArea\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'idArea\')"/><br>ÁREA</td>
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'razones\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'razones\')"/><br>RAZON</td>		
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'argumentos\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'argumentos\')"/><br>SUBRAZON</td>
									<td class="encabezadoTabla"><img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarSugerencias(0,\'argumentos\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarSugerencias(1,\'argumentos\')"/><br>EVIDENCIA</td>															
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('12-cargarSugerencias.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>