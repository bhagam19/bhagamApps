<?php
	include dirname(__FILE__).'../../../01-mdl/cnx.php';
	$nombre="";
	$nombres="";
	$apellidos="";
	$consulta=mysqli_query($cnx,"SELECT * FROM usuarios WHERE usuario=".$_SESSION['usuario']);
	while($fila=mysqli_fetch_array($consulta)){
		$nombres=$fila['nombres'];
		$apellidos=$fila['apellidos'];
		$nombre=$fila['nombres']." ".$fila['apellidos'];
		$usuarioCED=$fila['usuarioCED'];
	}
echo '
<div id="appsFormulario" class="appsFormularioDatosUsuario">
	<div id="">
		<div class="sesionImgInside" title="Click para cambiar foto." onclick="">
			<img src="../appsArt/usuario.svg"/>
		</div>		
		<div class="datosPersonales">
			<table class="" border=0>						
				<tr>
					<td><span class="etiqueta">Nombres: <br></span></td>
					<td><span class="datos">'.$nombres.'</span></td>
				</tr>
				<tr>
					<td><span class="etiqueta">Apellidos: <br></span></td>
					<td><span class="datos">'.$apellidos.'</span></td>
				</tr>
				<tr>
					<td><span class="etiqueta">ID: <br></span></td>
					<td><span class="datos">'.$usuarioCED.'</span></td>
				</tr>
				<tr>				
			</table> 
		</div>
		<div class="datosPersonales" style="cursor:pointer" title="Click para mostrar y ocultar." onclick="mostrarCambiarContrasena()">
			<span class="etiqueta">Cambiar Contraseña</span></td>
		</div>	
		<div class="btn" title="Click para cerrar sesión."  onclick="location.href=\'adm/03-cnt/01-crudLogin/02-cerrarSesion.php\'">
			Cerrar Sesión
		</div>
	</div> 
	<script type="text/javascript">document.getElementById("usuarioLogin").focus();</script>
</div>
';
?>