<html>
	<head>
		<script type="text/javascript" src="javascripts.js"></script>
		<script type="text/javascript" src="validarFormulario.js"></script>
	</head>
	
	<body>
		<form action="nuevoUsuario.php" method="POST" onsubmit="return validarFormularioAltaUsuario(this)" name="formularioAltaUsuario">
		
			<table border=0 
		style="
			position:relative;
			background:black;
			margin:0 auto;
			border-radius:10px;
			color:white;
			font-weight:bolder;
			box-shadow:2px 2px 15px 4px yellow;
			">
				<thead><td colspan="2" style="color:yellow;">Introduce los datos requeridos.<br><br></td></thead>
				<tr>
					<td id="usuario">Usuario:</td><td><input type="text" name="usuario"></td>
				</tr>
				<tr>
					<td id="contrasena">Contraseña:</td><td><input type="password" id="contrasenaInput" name="contrasena"></td>
				</tr>
				<tr>
					<td id="contrasena2">Repetir Contraseña:</td><td><input type="password" id="contrasena2Input" name="contrasena2" onchange="return validarPassword()"></td>
				</tr>
				<tr>
					<td id="nombre">Nombres:</td><td><input type="text" name="nombre" onkeypress="return validarTexto(event)" onchange="return validarNombreApellido(this)"></td>
				</tr>
				<tr>
					<td id="apellido">Apellidos:</td><td><input type="text" name="apellido" onkeypress="return validarTexto(event)" onchange="return validarNombreApellido(this)"></td>
				</tr>
				<tr>
					<td id="edad">Edad:</td><td><input type="text" name="edad" onkeypress="return validarNumeros(event)"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit"><input style="float:right;" value="cerrar" onclick="cerrarVentana()" type="button"></td>
				</tr>
			</table>
		</form>
	</body>
</html>

