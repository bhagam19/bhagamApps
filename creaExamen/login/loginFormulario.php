<div id="separador" style="display:none;"></div>
<div id="formulario" class="loginFormulario"> 	
	<div id="handler">
		<a class="cerrar">X</a>
		<p>INICIO DE SESIÓN</p>
	</div>
	<form method="POST" name="loginFormulario" action="../login/login.php">
		<table class="registro-usuario" border=0>
			<tr>
				<td>Usuario: <br><input type="text" name="usuario"></td>
			</tr>
			<tr>
				<td>Contraseña: <br><input type="password" name="contrasena"></td>
			</tr>
			<tr>
				<td><input type="submit" class="submit"></td>
			</tr>
			<tr>
				<td>¿Aún no tienes tu cuenta? <input  class="submit" style="cursor:pointer" type="button" onclick="popup(\'formularioaltausuario.php\',350,285)" value="Créala aquí"/>
				<!---<a href="javascript:popup(250,210)">Creala aquí</a>--></td>
			</tr>
		</table>
	</form>
</div>

