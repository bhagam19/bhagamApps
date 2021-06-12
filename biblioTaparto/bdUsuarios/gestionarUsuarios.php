<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>GESTIONS DE USUARIOS</title>
		<link rel="stylesheet" type="text/css" href="../principal/principal.css"/>
		<script type="text/javascript" src="principal.js"></script>
	</head>
<?php
session_start();
	if(!isset($_SESSION['usuario'])){
		echo 
		"
			<html>
				<head>
					<meta HTTP-equiv='REFRESH' content='0;url=../principal/principal.php'>
				</head>
			</html>
		";
	}else{
		$codigo=$_SESSION['permisos'];
		if($codigo==1){
			$pagina="../bdUsuarios/gestionarUsuarios";
			$link="Gestión Usuarios";
			
			include('../bdLogs/logsEscribir.php');
			//Crear conexión.
			include('../conexion/datosConexion.php');
			//Establecer y Ejecutar la consulta.
			$tabla='usuarios';
			@$usuarioAct=$_GET['usuarioAct'];
			@$permisosAct=$_GET['permisosAct'];
			@$contrasenaAct=$_GET['contrasenaAct'];
			@$nombreAct=$_GET['nombreAct'];
			@$apellidoAct=$_GET['apellidoAct'];
			@$edadAct=$_GET['edadAct'];
			
			if($usuarioAct){
				$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE NOT usuario='".$usuarioAct."'");
			}else{
				$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla); 				
			}
			
			include('../principal/encabezado.php');		
			echo 
			'	
				<div>
					<br>
					<table>
						<tr>
							<td colspan="3"><input style="font-size:18px; color:blue;" type="button" onclick="location.href=\'../principal/principal.php\'" value="Ir a Principal" /></td>
						</tr>
					</table>
				</div>
			';			
			//Imprimir consulta.	
			echo '
				<div id="Base-de-Datos">
					<div class="Base-de-Datos" style="width:98%">					
						GESTIÓN DE USUARIOS:<br><br>	
					<table class="tabla-BD" border="1" width=98%>
						<thead>
							<td class="encabezado-tabla">Permisos</td>
							<td class="encabezado-tabla">Usuario</td>
							<td class="encabezado-tabla">Contraseña</td>
							<td class="encabezado-tabla">Nombre</td>
							<td class="encabezado-tabla">Apellidos</td>
							<td class="encabezado-tabla">Edad</td>
							<td></td>
							<td></td>
						</thead>';
			while($fila=mysqli_fetch_array($peticion)){				
				echo 
				'
						<tr>
							<td>'.$fila["permisos"].'</td>
							<td>'.$fila["usuario"].'</td>
							<td>'.$fila["contrasena"].'</td>
							<td>'.$fila["nombre"].'</td>
							<td>'.$fila["apellido"].'</td>
							<td>'.$fila["edad"].'</td>
							<td><a href="eliminarUsuario.php?
							permiso='.$fila["permisos"].'&
							usuario='.$fila["usuario"].'&
							contrasena='.$fila["contrasena"].'&
							nombre='.$fila["nombre"].'&
							apellido='.$fila["apellido"].'&
							edad='.$fila["edad"].'">Eliminar</a></td>
							<td><a href="gestionarUsuarios.php?
							permisosAct='.$fila["permisos"].'&
							usuarioAct='.$fila["usuario"].'&
							contrasenaAct='.$fila["contrasena"].'&
							nombreAct='.$fila["nombre"].'&
							apellidoAct='.$fila["apellido"].'&
							edadAct='.$fila["edad"].'">Actualizar</a></td>
						</tr>
				';			
			}
			if($usuarioAct){
				echo
				'
					<tr>
						<form method="POST" action="actualizarUsuario.php">
							<td><input type="text" name="permisos" style="width:30px" value="'.$permisosAct.'"></td>
							<td><input type="text" name="usuario" style="width:100px" value="'.$usuarioAct.'"></td>
							<td><input type="text" name="contrasena" style="width:100px" value="'.$contrasenaAct.'"></td>
							<td><input type="text" name="nombre" style="width:200px" value="'.$nombreAct.'"></td>
							<td><input type="text" name="apellido" style="width:200px" value="'.$apellidoAct.'"></td>
							<td><input type="text" name="edad" style="width:30px" value="'.$edadAct.'"></td>
							<td><input type="submit" ></td>
							<td></td>						
						</form>
						
					</tr>
				';
			}else{
				echo
					'
						<tr>
							<form method="POST" action="nuevoUsuario.php">
								<td><input type="text" name="permisos" style="width:30px"></td>
								<td><input type="text" name="usuario" style="width:100px"></td>
								<td><input type="text" name="contrasena" style="width:100px"></td>
								<td><input type="text" name="nombre" style="width:200px"></td>
								<td><input type="text" name="apellido" style="width:200px"></td>
								<td><input type="text" name="edad" style="width:30px"></td>
								<td><input type="submit" ></td>
								<td></td>						
							</form>
						</tr>
					';
			}
			echo 
			'
					</table>
					</div>
				</div>
			</div>
		</body>
		';
		//Cerrar la conexión.
		mysqli_close($conexion);
		}else{
			echo 
			"
			Lo siento. No tienes permisos suficientes.<br><br>
			Si crees que deberías poder ingresar a esta opción, ponte en contacto con el administrador.
			<br><br>
			<a href='../principal/principal.php'>VOLVER</a>
			
			";
		}	
	}
?>

</html>