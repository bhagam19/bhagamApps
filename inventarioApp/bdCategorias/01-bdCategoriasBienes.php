<?php
	$paginaLogs="../bdCategorias/01-bdCategoriasBienes";//para escribir los Logs
	$linkLogs="Categorías";//para escribir los Logs
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
							CATEGORÍA DE BIENES<br><br>
							<table class="tablaBD">
								<thead>
									<tr>
										<td class="encabezadoTabla">COD</td>
										<td class="encabezadoTabla">CLASE DE BIENES</td>
										<td class="encabezadoTabla">CATEGORÍA</td>
									</tr>
	   								<tr>
	   									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarCategorias(\'codCategoria\')"/></td>
										<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarCategorias(\'codClase\')"/></td>
										<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarCategorias(\'nomCategoria\')"/></td>									
									</tr>   								
	   							</thead>
	   							<tbody id="actualizable">	
	   								
	   			';

				include('02-cargarCategoriasBienes.php');

				echo 

				'				</tbody>	
							</table>
						</div>
					</div>
				';
		}
	}
?>