<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>LIBROS EN BASE DE DATOS</title>
		<link rel="stylesheet" type="text/css" href="../principal/principal.css"/>
		<script type="text/javascript" src="formularioActualizarLibro.js"></script>
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
	//Variables
	$fechaRegistro=$_GET['fechaRegistro'];
	$usuario=$_GET['usuario'];
	$imagen=$_GET['imagen'];
	$codigo=$_GET['codigo'];
	$coleccion=$_GET['coleccion'];
	$titulo=$_GET['titulo'];
	$apellidoAutor=$_GET['apellidoAutor'];
	$nombreAutor=$_GET['nombreAutor'];
	$areaConocimiento=$_GET['areaConocimiento'];
	$materia=$_GET['materia'];
	$especialidad=$_GET['especialidad'];
	$paisAutor=$_GET['paisAutor'];
	$yearPublicacion=$_GET['yearPublicacion'];
	$volumen=$_GET['volumen'];
	$numPaginas=$_GET['numPaginas'];
	$cantEjemplares=$_GET['cantEjemplares'];
	$ejemplar=$_GET['ejemplar'];
	$calidad=$_GET['calidad'];

	include('../conexion/datosConexion.php');

	echo'
	<script>
		var area="'.$areaConocimiento.'";
		var pais="'.$paisAutor.'";
		var materia="'.$materia.'";
		var especialidad="'.$especialidad.'";
	</script>';

	echo '
					<body onload="listasSeleccion(area,pais,materia,especialidad)">
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
							<div>
							<br>
							<input style="font-size:18px; color:blue;" type="button" onclick="location.href=\'verBD.php\'" value="Ir a Base de Datos" />
							</div>
							
					';
					
					$tabla='libros';
					$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE fechaRegistro='".$fechaRegistro."' AND 
									usuario='".$usuario."' AND imagen='".$imagen."' AND codigo='".$codigo."' AND 
									coleccion='".$coleccion."' AND titulo='".$titulo."' AND 
									apellidoAutor='".$apellidoAutor."' AND nombreAutor='".$nombreAutor."' AND
									areaConocimiento='".$areaConocimiento."' AND materia='".$materia."' AND
									especialidad='".$especialidad."' AND paisAutor='".$paisAutor."' AND
									yearPublicacion=".$yearPublicacion." AND volumen=".$volumen." AND
									numPaginas=".$numPaginas." AND cantEjemplares=".$cantEjemplares." AND
									ejemplar=".$ejemplar." AND calidad='".$calidad."'");
					
					while($fila=mysqli_fetch_array($sql)){
					echo $fila['imagen'].
					'	
					<div id="capa-formulario" >
					<div class="capa-formulario">
						<form method="POST" action="actualizarLibro.php" onsubmit="return validar(this)" name="formularioActualizarLibro">
							<br><br>
							<strong>ACTUALIZAR REGISTRO</strong> <br><br>
							<fieldset>
							<table border=0>							
								<legend style="color:blue; font-weight:bolder">Identificación Principal</legend>
								<tr>
									<td id="coleccion">Tipo de Colección: </td><td colspan="1"><select name="coleccion">
																	<option value="'.$fila["coleccion"].'" selected>'.$fila["coleccion"].'</option>
																	<option value="Infantil">Infantil</option>
																	<option value="Juvenil">Juvenil</option>
																	<option value="Consulta">Consulta</option>
																	</select>
																</td>
									<td id="imagen" colspan="4">Imagen: <input name="imagen" type="file" value="'.$fila["imagen"].'"/></td>									
								</tr>
								<tr>
									<td height=20px></td>
								</tr>
								<tr>
									<td id="titulo">Título del Libro: </td><td colspan="5"><input type="text" name="titulo" onchange="return validarMayusculaInicial(this)" style="width:600" value="'.$fila["titulo"].'"></td>
								</tr>
								<tr>
									<td id="apellidoAutor">Apellidos del autor: </td><td colspan="2"><input type="text" name="apellidoAutor" onkeypress="return validarTexto(event)" onchange="return validarNombreApellido(this)" style="width:300" value="'.$fila["apellidoAutor"].'"></td>
									<td id="nombreAutor">Nombres del autor: </td><td colspan="2"><input type="text" name="nombreAutor" onkeypress="return validarTexto(event)" onchange="return validarNombreApellido(this)" style="width:300" value="'.$fila["nombreAutor"].'"></td>
								</tr>
								<tr>
									<td height=20px></td>
								</tr>
								<tr>
									<td id="areaConocimiento">Área del conocimiento: </td><td colspan="5"><select name="areaConocimiento" style="width:400" onchange ="cambiarMateria()"></select></td>															
								</tr>
								<tr>
									<td id="materia">Materia: </td><td colspan="5"><select name="materia" style="width:400" onchange="cambiarEspecialidad()"></select></td>															
								</tr>
								<tr>
									<td id="especialidad">Especialidad: </td><td colspan="5"><select name="especialidad" style="width:400"></select></td>																
								</tr>
								<tr>
									<td height=20px></td>
								</tr>
								<tr>
									<td id="paisAutor"> País del autor:</td><td><select name="paisAutor"></select></td>
									<td id="yearPublicacion"> Año de Publicación:</td><td><input type="text" name="yearPublicacion" onkeypress="return validarNumeros(event)" style="width:100" value="'.$fila["yearPublicacion"].'"></td>
									<td id="volumen"> Edición:</td><td><input type="text" name="volumen" onkeypress="return validarNumeros(event)" style="width:100" value="'.$fila["volumen"].'"></td>
								</tr>
							</table>
							</fieldset>
							<br>
							<fieldset>
							<legend style="color:red; font-weight:bolder">Datos de Existencia e Inventario</legend>
							<table>
								<tr>
									<td height=20px></td>
								</tr>
								<tr>
									<td id="numPaginas"> Páginas:</td><td colspan="2"><input type="text" name="numPaginas" onkeypress="return validarNumeros(event)" style="width:100" value="'.$fila["numPaginas"].'"></td>
									<td id="cantEjemplares"> Cántidad de Ejemplares:</td><td colspan="2"><input type="text" name="cantEjemplares" onkeypress="return validarNumeros(event)" style="width:100" value="'.$fila["cantEjemplares"].'"></td>
								</tr>
								<tr>
									<td id="ejemplar"> Ejemplar No.</td><td colspan="2"><input type="text" name="ejemplar" onkeypress="return validarNumeros(event)" style="width:100" value="'.$fila["ejemplar"].'"></td>
									<td id="calidad"> Estado del libro:</td><td colspan="2"><select name="calidad" style="width:100" >
														<option value="'.$fila["calidad"].'" selected>'.$fila["calidad"].'</option>
														<option value="Nuevo">Nuevo</option>
														<option value="Bueno">Bueno</option>
														<option value="Regular">Regular</option>
														<option value="Dañado">Dañado</option>
														
					</select>
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
							</div>						
						</form>
					</div>
					</div>
					';
					
					$_SESSION['titulo']=$titulo;
					
					mysqli_close($conexion);
					}
					echo '
						</div>
					</body>
					';

}
?>

</html>