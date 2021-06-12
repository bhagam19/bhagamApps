<?php
	
	$paginaLogs="../bdAreas/01-bdAreas";//para escribir los Logs
	$linkLogs="Áreas";//para escribir los Logs
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
						<span id="tituloBD">ÁREAS</span>
						<br><br>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarArea(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarArea(1,\'cod\')"/></td>
									<td class="encabezadoTabla">ÁREAS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarArea(0,\'area\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarArea(1,\'area\')"/></td>
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarAreas.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>