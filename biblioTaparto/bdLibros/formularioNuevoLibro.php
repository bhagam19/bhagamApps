<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AGREGAR NUEVO LIBRO</title>
		<link rel="stylesheet" type="text/css" href="../principal/principal.css"/>
		<script type="text/javascript" src="formularioNuevoLibro.js"></script>
		<script type="text/javascript" src="validarFormulario.js"></script>
	</head>
<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=../principal/principal.php'>
			</head>
		</html>";
}else{
    
    
    
	echo
	'
	<body onload="listasSeleccion()">
		<div id="contenedor">
			<div id="encabezado">
				<div id="encabezado-presentacion">
					<div class="titulo-aplicacion">
					BIBLIO APP
					</div>
				</div>
				<div id="usuario-registrado">
					<div class="usuario-registrado">
						Bienvenido <br>'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'						
					</div>
					<div class="boton-cerrar">
						<a href="../login/cerrarSesion.php">Cerrar Sesión</a>
					</div>						
				</div>				
			</div>
			<div id="capa-formulario">
				<div class="capa-formulario">
					<form method="POST" action="nuevoLibro.php" onsubmit="return validar(this)" name="formularioNuevoLibro" enctype="multipart/form-data">
						<br><br>
						<strong>AGREGAR UN NUEVO LIBRO</strong> <br><br>
						<fieldset>
						<table border=0>							
							<legend style="color:blue; font-weight:bolder">Identificación Principal</legend>
							<tr>
								<td id="coleccion">Tipo de Colección: </td><td colspan="1"><select name="coleccion">
																<option value=" " selected>Seleccione... </option>
																<option value="Infantil">Infantil</option>
																<option value="Juvenil">Juvenil</option>
																<option value="Consulta">Consulta</option>													
																</select>
															</td>	
								<td id="imagen" colspan="4">Imagen: <input name="imagen" type="file" /></td>									
							</tr>
							<tr>
								<td height=20px></td>
							</tr>
							<tr>
								<td id="titulo">Título del Libro: </td><td colspan="5"><input type="text" name="titulo" onchange="return validarMayusculaInicial(this)" style="width:600"></td>
							</tr>
							<tr>
								<td id="apellidoAutor">Apellidos del autor: </td><td colspan="2"><input type="text" name="apellidoAutor" onkeypress="return validarTexto(event)" onchange="return validarNombreApellido(this)" style="width:300"></td>
								<td id="nombreAutor">Nombres del autor: </td><td colspan="2"><input type="text" name="nombreAutor" onkeypress="return validarTexto(event)" onchange="return validarNombreApellido(this)" style="width:300"></td>
							</tr>
							<tr>
								<td height=20px></td>
							</tr>
							<tr>
								<td id="areaConocimiento" >Área del conocimiento: </td><td colspan="5"><select name="areaConocimiento" onchange ="cambiarMateria()" style="width:400"></select></td>															
							</tr>
							<tr>
								<td id="materia">Materia: </td><td colspan="5"><select name="materia" onchange ="cambiarEspecialidad()" style="width:400" onclick="cargarMateria()"></select></td>															
							</tr>
							<tr>
								<td id="especialidad" colspan=>Especialidad: </td><td colspan="5"><select name="especialidad" style="width:400"></select></td>																
							</tr>
							<tr>
								<td height=20px></td>
							</tr>
							<tr>
								<td id="paisAutor"> País del autor:</td><td><select name="paisAutor"></select></td>
								<td id="yearPublicacion"> Año de Publicación:</td><td><input type="text" name="yearPublicacion" onkeypress="return validarNumeros(event)" style="width:100"></td>
								<td id="volumen"> Edición:</td><td><input type="text" name="volumen" style="width:100" onkeypress="return validarNumeros(event)"></td>
							</tr>
						</table>
						</fieldset>
						<br>
						<fieldset>
						<legend style="color:green; font-weight:bolder">Datos de Existencia e Inventario</legend>
						<table>
							<tr>
								<td height=20px></td>
							</tr>
							<tr>
								<td id="numPaginas"> Páginas:</td><td colspan="2"><input type="text" name="numPaginas" onkeypress="return validarNumeros(event)" style="width:100"></td>
								<td id="cantEjemplares"> Cántidad de Ejemplares:</td><td colspan="2"><input type="text" name="cantEjemplares" onkeypress="return validarNumeros(event)" style="width:100"></td>
							</tr>
							<tr>
								<td id="ejemplar"> Ejemplar No.</td><td colspan="2"><input type="text" name="ejemplar" onkeypress="return validarNumeros(event)" style="width:100"></td>
								<td id="calidad"> Estado del libro:</td><td colspan="2"><select name="calidad" style="width:100">
													<option value=" " selected>Seleccione...</option>
													<option value="Nuevo">Nuevo</option>
													<option value="Bueno">Bueno</option>
													<option value="Regular">Regular</option>
													<option value="Dañado">Dañado</option>
												</select></td>
							</tr>
							<tr>
								<td height=20px></td>
							</tr>
							
						</table>
						</fieldset>
						<br>
						<div>
							<div id="guardar" style="position:relative; float:right; padding-left:20px; padding-right:20px;">
								<input type="submit" value="Guardar" style="width:80px">
							</div>
							<div id="cerrar" style="position:relative; float:right; padding-left:20px; padding-right:20px;">
								<input type="button" onclick="location.href=\'verBD.php\'" value="Cerrar" style="width:80px">
							</div>
							
						</div>						
					</form>
				</div>
			</div>
		</div>
	
	</body>


';
}
?>
</html>