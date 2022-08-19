<div id="appsEncabezadoGral">
	<div class="appsBtnMenu">
		<img title ="Menú" src="../../appsArt/menu.svg" onclick='alert("Inicia sesión para activar el menú.")'>
	</div>
	<div class="appsLogo">
		<img src="../appsArt/SvS.png"/>
	</div>
	<div class="appsTituloCinta">
	   RH+<br>Apps
	</div>
	<div class="appsContenidoCinta">
		<div>SINAI vs SIMAT</div>
		<div>Version: 0.1.0	</div>
		<div>Creado por: Adolfo Ruiz © 2022</div>	
	</div>
	<?php
		if(!isset($_SESSION['usuario'])){
			echo '
					<div class="appsInicioSesionCinta" title="Click para iniciar sesión." onclick="mostrarLogin()">
						Iniciar Sesión
					</div>
			';
		}else{
			include('../../01-mdl/cnx.php');//Agregamos la conexión
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