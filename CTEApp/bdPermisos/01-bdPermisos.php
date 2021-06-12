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
						<span id="tituloBD">PERMISOS</span>
						<br><br>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarPermisos(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarPermisos(1,\'cod\')"/></td>
									<td class="encabezadoTabla">PERMISOS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarPermisos(0,\'permisos\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarPermisos(1,\'permisos\')"/></td>
									
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarPermisos.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>