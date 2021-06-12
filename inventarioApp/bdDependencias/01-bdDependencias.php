<?php

	$paginaLogs="../bdDependencias/01-bdDependencias";//para escribir los Logs
	$linkLogs="Dependencias";//para escribir los Logs
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
						<div class="tituloBD">DEPENDENCIAS</div>
						<div id="reestablecerBD">
              <form enctype="multipart/form-data" action="../bdDependencias/06-cargarDependenciasExcel.php" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                <input name="subir_archivo" type="file" />
                <input type="submit" value="Reestablecer BD" />
              </form>
						</div>
						
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD</td>
									<td class="encabezadoTabla">DEPENDENCIA</td>
									<td class="encabezadoTabla">UBICACIÓN</td>
									<td class="encabezadoTabla" colspan="2">NOMBRE DEL RESPONSABLE</td>
								</tr>
   								<tr>
   									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarDependencias(\'codDependencias\')"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarDependencias(\'nomDependencias\')"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarDependencias(\'codUbicacion\')"/></td>
									<td class="encabezadoTabla" style="text-align:center" colspan="2"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarDependencias(\'usuarioID\')"/></td>						
								</tr>   								
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarDependencias.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>