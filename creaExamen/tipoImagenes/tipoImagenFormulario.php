<div id="separador" style="display:none;"> </div>
<div id="formulario" class="tipoImagenFormulario">	
	<div id="handler">
		<a class="cerrar">X</a>
		<p>INSERTAR PREGUNTAS TIPO IMAGEN</p>
	</div>
		<form method="POST" name="formularioTipoImagen" action="nuevaPreguntaTipoImagen.php" enctype="multipart/form-data">
		<table border=0>
			<tr>
				<td>Imagen: </td>
				<td colspan="2"><input class="submit" name="imagen" type="file"/></td>				
			</tr>
			<tr>
				<td>Renombrar:</td>
				<td><input name="nombre" type="text" value="Nombre" class="input" id="Nombre"/></td>
				<td>(Opcional)</td>
			</tr>
			<tr style="height:20px">
			</tr>
			<tr>
				<td>Tema: </td>
				<td style="width:50px" colspan="2"><select name="temaSelect">
										<option value="">Seleccione...</option>
										<?php
											include('../conexion/conectarBD2.php');
											$consultaTemas=mysqli_query($conexion,"SELECT * FROM tipoImagen");
											$listado=array();
											while($listadoTemas=mysqli_fetch_array($consultaTemas)){
												array_push($listado,$listadoTemas['tema']);
											}
											$temas=array_unique($listado);
											foreach($temas as $tema){
												echo
												'
												<option value="'.$tema.'">'.$tema.'</option>';
											}
										?>	
										</select><input name="tema" type="text" value="O ingrese..." class="input" id="O ingrese..." width="200"/></td>	
			</tr>
			<tr style="height:15px">
			</tr>
			<tr>
				<td>Opción 1: </td>
				<td style="width:50px"><input name="opcion1" type="text" value="Opción 1" class="input" id="Opción 1"/></td>	
				<td style="font-weight:none;">(Respuesta correcta)</td>
			</tr>
			<tr>
				<td>Opción 2:</td>
				<td><input name="opcion2" type="text" value="Opción 2" class="input" id="Opción 2"/></td>				
			</tr>
			<tr>
				<td>Opción 3:</td>
				<td><input name="opcion3" type="text" value="Opción 3" class="input" id="Opción 3"/></td>
				<td><input class="submit" type="submit" value="Agregar Preguntas" style="float:right"/></td>
			</tr>			
			<tr style="height:20px">
			</tr>
				
		</table>
	</form>
</div>