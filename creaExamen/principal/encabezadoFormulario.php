<div id="separador" style="display:none;"> </div>
<div id="formulario" class="encabezadoFormulario">	
	<div id="handler">
		<a class="cerrar">X</a>
		<p>DATOS DEL ENCABEZADO</p>
	</div>
	<form name="encabezadoFormulario" method="POST" action="actualizarEncabezado.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Institución: </td>
				<td> <input type="text" name="institucion"/></td>				
			</tr>
			<tr>
				<td>Asignatura: </td>
				<td><input type="text" name="Asignatura"/></td>				
			</tr>
			<tr>
				<td>Profesor: </td>
				<td><input type="text" name="Profesor"/></td>				
			</tr>
			<tr>
				<td>Estudiante: </td>
				<td><input type="text" name="Estudiante"/></td>				
			</tr>
			<tr>
				<td>Grado: </td>
				<td><input type="text" name="Grado"/></td>				
			</tr>
			<tr>
				<td>Escudo: </td>
				<td><input type="file" name="Imagen"/></td>
			</tr>
			<tr style="height:20px">
			</tr>
			<tr>
				<td></td>
				<td><input class="submit" type="submit" value="Aceptar" style="float:right"/></td>				
			</tr>	
		</table>
	</form>
</div>