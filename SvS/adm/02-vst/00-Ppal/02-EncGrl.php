<div id="appsEncabezadoGral">
	<div class="appsBtnMenu">
		<img title ="Menú" src="../../appsArt/menu.svg" onclick='mostrarCargadorDatos()'>
	</div>
	<div class="appsLogo">
		<img src="../appsArt/SvS.png"/>
	</div>
	<div class="appsTituloCinta">
	   RH+<br>Apps
	</div>
	<div class="appsContenidoCinta">
		<div>SIN INCONSISTENCIAS EN SIMAT</div>
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
	?>
	<div id="appsSesionLogedIn">
		<img src="../appsArt/usuario.svg" title="Click para ver información del usuario."  onclick="mostrarDatosUsuario()">
	</div>
	<?php } ?>
</div>