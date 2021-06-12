<div id="formulario" class="formularioLogin">
	<div>	
		<div>
			<table border=0>
				<form method="POST" action="00-principal.php" onsubmit="return validarLogin(this.usuarioLogin.value,this.contrasenaLogin.value);">		
					<tr>
						<td><span>Usuario: <br></span><input type="text" name="usuario" id="usuarioLogin"></td>
					</tr>
					<tr>
						<td><span>Contraseña: <br></span><input type="password" name="contrasena" id="contrasenaLogin"></td>
					</tr>
					<tr>
						<td><input class="btnLogin" type="submit" value="Enviar"></td>
					</tr>
					<tr>
						<td><span>¿Aún no tienes tu cuenta? </span><br>
						<input  class="btnLogin" type="button" onclick="mostrarFormularios('.formularioNuevoUsuario')" value="Créala aquí"/>
					</td>
					</tr>
				</form>
			</table>  
		</div>
	</div>
	<script type="text/javascript">document.getElementById("usuarioLogin").focus();</script>
</div>