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
	<div id="">
		<div class="sesionImgInside" title="Click para cambiar foto." onclick="">
			<img src="../appsArt/usuario.svg"/>
		</div>		
		<div class="datosPersonales">
			<table class="" border=0>						
				<tr>
					<td><span class="etiqueta">DANE: <br></span></td>
					<td><span class="datos"><?php echo $dane?></span></td>
				</tr>
				<tr>
					<td><span class="etiqueta">Institución: <br></span></td>
					<td><span class="datos"><?php echo $institucion?></span></td>
				</tr>			
			</table> 
		</div>
		<div class="datosPersonales" style="cursor:pointer;user-select:none" title="Click para mostrar y ocultar." onclick="mostrarCambiarContrasena()">
			<span class="etiqueta">Cambiar Contraseña</span></td>
		</div>	
		<div class="btn" title="Click para cerrar sesión."  onclick="location.href='adm/03-cnt/01-login/02-cerrarSesion.php'">
			Cerrar Sesión
		</div>
	</div> 
	<script type="text/javascript">document.getElementById("usuarioLogin").focus();</script>
</div>