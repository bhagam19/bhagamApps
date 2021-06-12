<?php
	
	$paginaLogs="../bdDocentes/01-bdDocentes";//para escribir los Logs
	$linkLogs="Docentes";//para escribir los Logs
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
						<span id="tituloBD">DOCENTES</span>
						<br><br>
						<table class="tablaBD">
							<thead>
								<tr>
									<td class="encabezadoTabla">COD. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'cod\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'cod\')"/></td>
									<td class="encabezadoTabla">IDENTIFICACIÓN <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'ID\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'ID\')"/></td>
									<td class="encabezadoTabla">APELLIDOS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'apellidos\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'apellidos\')"/></td>
									<td class="encabezadoTabla">NOMBRES <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'nombres\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'nombres\')"/></td>
									<td class="encabezadoTabla">USUARIO <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'usuario\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'usuario\')"/></td>
									<td class="encabezadoTabla">CONTRASEÑA <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'contrasena\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'contrasena\')"/></td>
									<td class="encabezadoTabla">GEN. <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'genero\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'genero\')"/></td>
									<td class="encabezadoTabla">PERMISOS <img class="imgOrden" src="../art/ordenarAZ.svg" title="Ordenar Ascendente" onclick="ordenarDocentes(0,\'permiso\')"/><img class="imgOrden" src="../art/ordenarZA.svg" title="Ordenar Descendente" onclick="ordenarDocentes(1,\'permiso\')"/></td>
								</tr>					
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarDocentes.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>