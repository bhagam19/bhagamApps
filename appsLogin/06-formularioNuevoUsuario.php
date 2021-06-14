<div id="separador" style="display:none;"></div>
	<div id="appsFormulario" class="appsFormularioNuevoUsuario"> 	
		<div id="handler">
			<a class="cerrar">X</a>
			<p>REGISTRO DE NUEVO USUARIO</p>
		</div>    
		<form method="POST" name="formularioNuevoUsuario" action="index.php" onsubmit="return registrarUsuario(1);">
			<table class="registro-usuario" border=0>
				<tr>
					<td><span>Nombres: <br></span><input class="input" type="text" name="nombres" id="nombres" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Apellidos: <br></span><input class="input" type="text" name="apellidos" id="apellidos" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Correo Electrónico: <br></span><input class="input" type="text" name="correo" id="correo" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Usuario: <br></span><input class="input" type="text" name="usuario" id="usuario" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Contraseña: <br></span><input class="input" type="password" name="contrasena" id="contrasena" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>
				<tr>
					<td><span>Confirmar Contraseña: <br></span><input class="input" type="password" name="confirmarContrasena" id="confirmarContrasena" onkeyup="cambiarFondoInput(this.id)"></td>
				</tr>									
				<tr>
					<td><input style="left:30px" type="submit" class="submit" value="Enviar"></td>
				</tr>			
			</table>
		</form>
		
	</div>	
</div>