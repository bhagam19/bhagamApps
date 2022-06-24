<div id="formularioLogin">					
	<div class="acceso-registrado">	
		<?php
			include('../login/formularioNuevoUsuario.php');
			echo '
			<div>
				<table class="nuevo-usuario" border=0>
					<form method="POST" action="acceso.php" onsubmit="return validarLogin(this.usuarioLogin.value,this.contrasenaLogin.value);">				
						<tr>
							<td><span>Usuario: <br></span><input type="text" name="usuario" id="usuarioLogin"></td>
						</tr>
						<tr>
							<td><span>Contraseña: <br></span><input type="password" name="contrasena" id="contrasenaLogin"></td>
						</tr>
						<tr>
							<td><input type="submit" style="left:30px"></td>
						</tr>
						<tr>
							<td><span>¿Aún no tienes tu cuenta? </span>
							<input  style="cursor:pointer" type="button" onclick="mostrarFormularios(\'.formularioNuevoUsuario\')" value="Créala aquí"/>
						</td>
						</tr>
					</form>
				</table>  
			</div
			';
		?>
	</div>
	<script type="text/javascript">document.getElementById("usuarioLogin").focus();</script>
</div>