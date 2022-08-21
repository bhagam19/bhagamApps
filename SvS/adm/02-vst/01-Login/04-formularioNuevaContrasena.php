<div id="appsFormulario" class="appsFormularioNuevaContrasena">
	<div>	
		<div>
			<table class="nuevo-usuario" border=0>
				<form>		
					<tr>
						<td><span>Contraseña Actual: <br></span><input type="password" name="contrasenaActual" id="contrasenaActual" onkeyup="cambiarFondoInput(this.id)"></td>
					</tr>
					<tr>
						<td><span>Nueva Contraseña: <img id="barraContrasena" style="width:60px" src=""><br></span><input type="password" name="nuevaContrasena" id="nuevaContrasena" onkeyup="cambiarFondoInput(this.id)"></td>
					</tr>
					<tr>
						<td><span>Confirmar Contraseña: <br></span><input type="password" name="confirmacionContrasena" id="confirmacionContrasena" onkeyup="cambiarFondoInput(this.id)"></td>
					</tr>
					<tr>
						<td><input type="button" value="Enviar" style="left:30px" onclick="validarNuevaContrasena(contrasenaActual.value,nuevaContrasena.value,confirmacionContrasena.value)"></td>
					</tr>					
				</form>
			</table>  
		</div>
		<div id="contrasenaCheckList">
			<span><img id="check01" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Mínimo 8 caracteres.</span><br>
			<span><img id="check02" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos una mayúscula.</span><br>
			<span><img id="check03" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos una minúscula.</span><br>
			<span><img id="check04" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos un número.</span><br>
			<span><img id="check05" style="width:15px; padding:0 5px;" src="../appsArt/mal.png">Al menos un símbolo.</span><br>
		</div>
	</div>
	<script type="text/javascript">document.getElementById("usuarioLogin").focus();</script>
</div>