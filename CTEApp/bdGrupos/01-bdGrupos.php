<?php
	
	$paginaLogs="../bdGrupos/01-bdGrupos";//para escribir los Logs
	$linkLogs="Grupos";//para escribir los Logs
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
						<span id="tituloBD">GRUPOS</span>
						<br><br>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarGrupo(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarGrupo(1,\'cod\')"/></td>
									<td class="encabezadoTabla">GRUPOS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarGrupo(0,\'grupo\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarGrupo(1,\'grupo\')"/></td>
									
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarGrupos.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>