<div id="encabezadoGral">
	<div class="btnMenu">
		<img title ="Menú" src="../art/menu.svg">
	</div>
	<div class="logo">
		<img src="../principal/escudo.jpg"/>
	</div>
	<div class="tituloCinta">
	   Identificador de CTE y NEE
	</div>
	<div class="contenidoCinta">
		<ul>
			<li>IE TAPARTÓ 2019</li>
			<li>Versión 1.0</li>
			<li><a href="https://www.facebook.com/adolfo.ruiz.79" target="_blank" style="text-decoration:none;color:blue">Adolfo Ruiz © 2019</a></li>
		</ul>	
	</div>	

	<?php

		if(isset($_SESSION['usuario'])){

			include('../conexion/datosConexion.php');
			$nombre="";
			$consulta=mysqli_query($conexion,"SELECT * FROM docentes WHERE usuario=".$_SESSION['usuario']);
			while($fila=mysqli_fetch_array($consulta)){
				$nombre=$fila['nombres']." ".$fila['apellidos'];
				$ID=$fila['ID'];
			}


			echo '
					<div id="sesionLogedIn">
						<div class="sesionImg" >
							<img src="../art/usuario.svg"/>
						</div>
						
						<div class="sesionNom">
							<span title="Click para cambiar contraseña."  onclick="mostrarCambiarContrasena()">'.$nombre.'<br> CC: '.$ID.' </span>
							<span class="cerrarSesion" title="Click para cerrar sesión." onclick="location.href=\'../login/cerrarSesion.php\'">Cerrar Sesión</span>
						</div>
					</div>
			';
		}

	?>
	
</div>