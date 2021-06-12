<div id="formularioNuevaContrasena" class="formularioNuevaContrasena">
	<div class="acceso-registrado">	
		<div>
			<table class="nuevo-usuario" border=0>
				<form>		
					<tr>
						<td><span>Contraseña Actual: <br></span><input type="password" name="contrasenaActual" id="contrasenaActual"></td>
					</tr>
					<tr>
						<td><span>Nueva Contraseña: <br></span><input type="password" name="nuevaContrasena" id="nuevaContrasena"></td>
					</tr>
					<tr>
						<td><span>Confirmar Contraseña: <br></span><input type="password" name="confirmacionContrasena" id="confirmacionContrasena"></td>
					</tr>
					<tr>
						<?php
							$usuario=$_SESSION['usuario'];
							echo'
								<td><input type="button" value="Enviar" style="left:30px" onclick="validarNuevaContrasena('.$usuario.',contrasenaActual.value,nuevaContrasena.value,confirmacionContrasena.value)"></td>
							';
						?>						
					</tr>					
				</form>
			</table>  
		</div>
	</div>
	<script type="text/javascript">document.getElementById("contrasenaActual").focus();</script>
</div>