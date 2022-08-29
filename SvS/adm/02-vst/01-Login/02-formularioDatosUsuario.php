<?php
	require_once dirname(__FILE__).'/../../01-mdl/index.php';
	$dato=new modeloController();
    $respuesta=$dato->cargarUsuarioActivo();
	$dane;
	$institucion;
	foreach($respuesta as $key=>$v){
		$dane=$v['dane'];
		$institucion=$v['institucion'];
	}
?>
<div id="appsFormulario" class="appsFormularioDatosUsuario">
	<div id="contenedor-gral-datos-usuario">
		<div class="sesionImgInside" title="Click para cambiar foto." onclick="">
			<img src="../appsArt/usuario.svg"/>
		</div>		
		<div class="contenedor-division">
			<div class="contenedor-datos-usuarios">						
				<div class="datos-usuarios">
					<span class="etiqueta">DANE:</span>
					<span class="datos"><?php echo $dane?></span>
				</div>
				<div class="datos-usuarios">
					<span class="etiqueta">Institución:</span>
					<span class="datos"><?php echo $institucion?></span>
				</div>			
			</div> 
		</div>
		<div class="contenedor-division cambiar-contrasena" title="Click para mostrar y ocultar." onclick="mostrarCambiarContrasena()">
			<span class="etiqueta">Cambiar Contraseña</span>
		</div>	
		<div class="btn" title="Click para cerrar sesión."  onclick="location.href='adm/03-cnt/01-login/02-cerrarSesion.php'">
			Cerrar Sesión
		</div>
	</div>
</div>