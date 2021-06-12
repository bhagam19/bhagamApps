<div id="menu-navegacion">					
	<div class="acceso-registrado">	
		<?php
			if(isset($_SESSION['usuario'])){
				$codigo=$_SESSION['permisos'];
				if($codigo==1){								
					echo '
					<div class="titulo-menu-administrador">
						Menú Super Administrador
					</div>
					<div class="menu-administrador">
						<ul>
							<!--<li onclick="location.href=\'formularioNuevoLibro.php\'"><a href="formularioNuevoLibro.php">Insertar Libro</a></li>-->
							<li onclick="location.href=\'../bdUsuarios/gestionarUsuarios.php\'"><a href="../bdUsuarios/gestionarUsuarios.php">Gestionar Usuarios</a></li>
							<li onclick="location.href=\'../bdLogs/logsVer.php\'"><a href="../bdLogs/logsVer.php">Ver Visitas</a></li>
							<li onclick="location.href=\'../bdLibros/verBD.php\'"><a href="../bdLibros/verBD.php">Ver Base de Datos</a></li>
							<li onclick="location.href=\' \'"><a href=" ">Préstamos</a></li>
						</ul>
					</div>
					';
				}elseif($codigo==2){
					echo '
					<div class="titulo-menu-administrador">
						Menú Administrador
					</div>
					<div class="menu-administrador">
						<ul>
							<!--<li onclick="location.href=\'formularioNuevoLibro.php\'"><a href="formularioNuevoLibro.php">Insertar Libro</a></li>
							<li onclick="location.href=\'../bdUsuarios/gestionarUsuarios.php\'"><a href="../bdUsuarios/gestionarUsuarios.php">Gestionar Usuarios</a></li>
							<li onclick="location.href=\'../bdLogs/logsVer.php\'"><a href="../bdLogs/logsVer.php">Ver Visitas</a></li>-->
							<li onclick="location.href=\'../bdLibros/verBD.php\'"><a href="../bdLibros/verBD.php">Ver Base de Datos</a></li>
							<li onclick="location.href=\' \'"><a href=" ">Préstamos</a></li>
						</ul>
					</div>
					';
				}elseif($codigo==3){
					echo '
					<div class="titulo-menu-administrador">
						Menú Usuario
					</div>
					<div class="menu-administrador">
						<ul>
							<!--<li onclick="location.href=\'formularioNuevoLibro.php\'"><a href="formularioNuevoLibro.php">Insertar Libro</a></li>
							<li onclick="location.href=\'../bdUsuarios/gestionarUsuarios.php\'"><a href="../bdUsuarios/gestionarUsuarios.php">Gestionar Usuarios</a></li>
							<li onclick="location.href=\'../bdLogs/logsVer.php\'"><a href="../bdLogs/logsVer.php">Ver Visitas</a></li>-->
							<li onclick="location.href=\'../bdLibros/verBD.php\'"><a href="../bdLibros/verBD.php">Ver Base de Datos</a></li>
							<li onclick="location.href=\' \'"><a href=" ">Mis Reservaciones</a></li>
						</ul>
					</div>
					';
				}
			}else{
				echo '
				<table class="nuevo-usuario" border=0>
					<form method="POST" action="../login/login.php">				
						<tr>
							<td>Usuario: <br><input type="text" name="usuario"></td>
						</tr>
						<tr>
							<td>Contraseña: <br><input type="password" name="contrasena"></td>
						</tr>
						<tr>
							<td><input type="submit"></td>
						</tr>
						<tr>
							<td>¿Aún no tienes tu cuenta? <input  style="cursor:pointer" type="button" onclick="popup(\'formularioaltausuario.php\',350,285)" value="Créala aquí"/>
							<!---<a href="javascript:popup(250,210)">Creala aquí</a>--></td>
						</tr>
					</form>
				</table>
				';
			}
		?>
	</div>
</div>