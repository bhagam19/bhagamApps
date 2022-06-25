<div id="encabezado">				
	<div id="encabezado-presentacion">
		
		<div id="logo">
			<img class="logo" src="../principal/escudo.jpg"/>
		</div>
		<div class="titulo-aplicacion">
		   IENS 2015					
		</div>
		<div id="fachada">
			<img class="fachada" src="../principal/fachada.jpg"/>
		</div>
	</div>
	<div id="usuario-registrado">
		<?php
		
		if(isset($_SESSION['usuario'])){
			$permiso=$_SESSION['permiso'];
			if($permiso==1||$permiso==3){
				include('../conexion/datosConexion.php');
		
				$tabla="docentes";
				$docente="";
				$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$_SESSION['docenteID']);
				while($fila=mysqli_fetch_array($sql)){
					$docente=$fila['nombres']." ".$fila['apellidos'];
				}
				
				if($docente!=""){
					echo'
					<div class="usuario-registrado">
						Te damos la bienvenida, '.$docente.'						
					</div>
					<div class="boton-cerrar">
						<a href="../login/cerrarSesion.php">Cerrar Sesión</a>
					</div>
					';
				}else{
					echo'
					<div class="usuario-registrado">
						Te damos la bienvenida, Administrador.						
					</div>
					<div class="boton-cerrar">
						<a href="../login/cerrarSesion.php">Cerrar Sesión</a>
					</div>
					';
				}
				
				mysqli_close($conexion);
			}
		}		
		?>		
	</div>				
</div>