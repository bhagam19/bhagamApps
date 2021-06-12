<?php
	
	$paginaLogs="../bdUsuarios/01-bdUsuarios";//para escribir los Logs
	$linkLogs="Usuarios";//para escribir los Logs
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
						<div class="tituloBD">ADMINISTRACIÓN DE USUARIOS</div>
						<div id="reestablecerBD">
							    <!-- 
							    <input id="archivoFuente" type="file" name="archivoFuente"/><br>					    
							    <input type="submit" name="uploadBtn" value="Restablecer BD Usuarios" onclick="reestablecerTablaUsuarios(archivoFuente.value)"/>
						        -->
						        <form enctype="multipart/form-data" action="../bdUsuarios/06-cargarUsuariosExcel.php" method="POST">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                                    <input name="subir_archivo" type="file" />
                                    <input type="submit" value="Reestablecer BD" />
                                </form>
						
						</div>
						
						
						<table class="tablaBD">
							<thead>
								<tr>
									<th class="encabezadoTabla">ID</th>
									<th class="encabezadoTabla">DOC. IDENTIDAD</th>
									<th class="encabezadoTabla">APELLIDOS</th>
									<th class="encabezadoTabla">NOMBRES</th>
									<th class="encabezadoTabla">USUARIO</th>
									<th class="encabezadoTabla">CONTRASEÑA</th>
									<th class="encabezadoTabla">RESPONSABLE</th>
									<th class="encabezadoTabla" colspan="2">PERMISOS</th>
								</tr>
   								<tr>
   									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuarioID\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'usuarioID\',1)"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuarioCED\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'usuarioCED\',1)"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'apellidos\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'apellidos\',1)"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'nombres\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'nombres\',1)"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'usuario\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'usuario\',1)"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'contrasena\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'contrasena\',1)"/></td>
									<td class="encabezadoTabla" style="text-align:center"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'defUsuario\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'defUsuario\',1)"/></td>
									<td class="encabezadoTabla" style="text-align:center" colspan="2"><img src="../art/ordenarAZ.svg" title="Ordenar A-Z" onclick="ordenarUsuario(\'permiso\',0)"/><img class="imgOrden" src="../art/ordenarZA.svg" onclick="ordenarUsuario(\'permiso\',1)"/></td>			
								</tr>   								
   							</thead>
   							<tbody id="actualizable">
   								
   			';

			include('02-cargarUsuarios.php');

			echo 

			'				</tbody>	
						</table>
					</div>
				</div>
			';			
		}

	}
?>