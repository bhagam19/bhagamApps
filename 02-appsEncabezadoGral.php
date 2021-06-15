<div id="appsEncabezadoGral">
	<div class="appsBtnMenu">
		<img title ="Menú" src="appsArt/menu.svg" onclick='alert("Inicia sesión para activar el menú.")'>
	</div>
	<div class="appsLogo">
		<img src="appsArt/aIcon.png"/>
	</div>
	<div class="appsTituloCinta">
	   Bhagam's<br>Apps
	</div>
	<div class="appsContenidoCinta">
		<ul>
			<li>Aplicaciones Educativas</li>
			<li>Version: 3.0.3</li>
			<li>Creado por: <a href="https://www.facebook.com/adolfo.ruiz.79" target="_blank" style="">Adolfo Ruiz © 2019</a></li>
		</ul>	
	</div>	

	<?php
		if(!isset($_SESSION['usuario'])){
			echo '
					<div class="appsInicioSesionCinta" title="Click para iniciar sesión." onclick="mostrarLogin()">
						Iniciar Sesión
					</div>
			';
		}else{
			include('appsConexion/datosConexion.php');
			$nombre="";
			$consulta=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='".$_SESSION['usuario']."'");
			while($fila=mysqli_fetch_array($consulta)){
				$nombre=$fila['nombres']." ".$fila['apellidos'];
				$usuarioCED=$fila['usuarioCED'];
			}			
			echo '
					<div id="appsSesionLogedIn">
						<div class="appsSesionImg" >
							<img src="appsArt/usuario.svg"/ title="Click para ver información del usuario."  onclick="mostrarDatosUsuario()">
						</div>
					</div>
			';
		}
	?>
</div>