<?php
	
	$paginaLogs="../bdUbicaciones/01-bdUbicaciones";//para escribir los Logs
	$linkLogs="Ubicaciones";//para escribir los Logs
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
						<div class="tituloBD">UBICACIONES DE DEPENDENCIAS</div>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD</td>
									<td class="encabezadoTabla" colspan="2">UBICACIONES DE DEPENDENCIAS</td>
								</tr>
   								<tr>
   									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUbicacion(\'codUbicacion\')"/></td>
									<td class="encabezadoTabla" style="text-align:center" colspan="2"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUbicacion(\'nomUbicacion\')"/></td>							
								</tr>   								
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarUbicaciones.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>