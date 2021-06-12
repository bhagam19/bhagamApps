<?php
	
	$paginaLogs="../bdAlmacenamiento/01-bdAlmacenamiento";//para escribir los Logs
	$linkLogs="Almacenamiento";//para escribir los Logs
	include('../bdLogs/01-bdEscribirLogs.php');

	if(!isset($_SESSION['usuario'])){
		
		echo 
			'
				Lo siento. No tienes permisos suficientes.<br><br>
				Si crees que deberías poder ingresar a esta opción, ponte en contacto con el administrador.
				<br><br>
			
			';		

	}else{
		
		$codigo=$_SESSION['permiso'];
		if($codigo==6){

			echo 	
			'
				<div id="baseDeDatos">
					<div class="baseDeDatos">
						<div class="tituloBD">OPCIONES DE ALMACENAMIENTO</div>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD</td>
									<td class="encabezadoTabla" colspan="2">OPCIONES DE ALMACENAMIENTO</td>
								</tr>
   								<tr>
   									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarAlmacen(\'codAlmacenamiento\')"/></td>
									<td class="encabezadoTabla" style="text-align:center" colspan="2"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarAlmacen(\'nomAlmacenamiento\')"/></td>							
								</tr>   								
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarOpcionesAlmacenamiento.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>