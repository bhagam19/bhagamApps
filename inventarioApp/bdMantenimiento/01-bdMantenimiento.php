<?php

	$paginaLogs="../bdMantenimiento/01-bdMantenimiento";//para escribir los Logs
	$linkLogs="Mantenimiento";//para escribir los Logs
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
						<div class="tituloBD">ESTADO DEL MANTENIMIENTO</div>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD</td>
									<td class="encabezadoTabla" colspan="2">ESTADO DEL MANTENIMIENTO</td>
								</tr>
   								<tr>
   									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarMantenimiento(\'codMantenimiento\')"/></td>
									<td class="encabezadoTabla" style="text-align:center" colspan="2"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarMantenimiento(\'nomMantenimiento\')"/></td>							
								</tr>   								
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarMantenimiento.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>