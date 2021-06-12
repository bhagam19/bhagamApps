<!doctype html>
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/test01.ico" />
		<title>Creador de Examenes</title>
		<link rel="stylesheet" type="text/css" href="../css/estiloClasico.php"/>
		<script type="text/javascript" src="../jquery/jquery.ui.core.js"></script>
		<script type="text/javascript" src="../jquery/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="../jquery/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="../jquery/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="../jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../jquery/jquery-ui.custom.js"></script>
		<script type="text/javascript" src="../principal/principal.js"></script>
		
	</head>
	<div id="cobertor"></div>
<?php
session_start();
if(isset($_SESSION['usuario'])){
	include('../principal/menuPrincipal.php');
	include('tipoImagenFormulario.php');
	@$filtro=$_GET['filtro'];
	@$orderBy=$_GET['orderBy'];
	include('../conexion/conectarBD2.php');
	$tabla='tipoImagen';
	if($orderBy){
		if($filtro&&$orderBy){
			//Si hay "orderBy" y tambien hay "filtro"
			$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$_SESSION['usuario']."' AND
								contrasena='".$_SESSION['contrasena']."' AND tema='".$filtro."' ORDER BY ".$orderBy);
		}else{
			//Si hay "orderBy" pero no hay "filtro"
			$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." usuario='".$_SESSION['usuario']."' AND
								contrasena='".$_SESSION['contrasena']."' ORDER BY ".$orderBy);
		}
	}elseif($filtro){
		//Si hay "filtro" únicamente.
		$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$_SESSION['usuario']."' AND
							contrasena='".$_SESSION['contrasena']."' AND tema='".$filtro."'");
	}else{	
		//si no hay ni "filtro" ni "orderBy"
		$peticion=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE usuario='".$_SESSION['usuario']."' AND
							contrasena='".$_SESSION['contrasena']."'"); 
	}
	$consultaTemas=mysqli_query($conexion,"SELECT * FROM tipoImagen");
	$listado=array();
	while($listadoTemas=mysqli_fetch_array($consultaTemas)){
		array_push($listado,$listadoTemas['tema']);
	}
	$temas=array_unique($listado);
	echo
	'
		<div id="margenTipoImagen" class="moverTipoImagen">
			<div id="filtro">
				<table>
					<tr>
						<form method="GET" action="verPreguntasTipoImagen.php" >
							<td>Filtrar por Tema: <select name="filtro" class="input">
								<option value="">Seleccione...</option>
								';
						foreach($temas as $tema){
							echo'
								<option value="'.$tema.'">'.$tema.'</option>';
								}						
					echo 
						'
								</select></td>						
							<td><input class="submit" type="submit"/></td>
							</form>
							<td><input class="submit" type="button" 
								value="Agregar Nueva Pregunta" onclick="mostrarFormularios(\'.tipoImagenFormulario\')">
								</td>
					</tr>
				</table>
			</div>
			<table class ="Tabla">
				<thead >
					<tr >
						<th class="encabezadoTabla" style="width:100px;">TEMA</th>
						<th class="encabezadoTabla">IMAGEN</th>
						<th class="encabezadoTabla">RESPUESTA CORRECTA</th >
						<th class="encabezadoTabla">OPCIÓN 2</th>
						<th class="encabezadoTabla">OPCIÓN 3</th>
						<th> </th>
						<th> </th>
					</tr>
				</thead>
	';
	while($fila=mysqli_fetch_array($peticion)){
			echo
				'
				<tr class="tr-body">
					<td>'.$fila['tema'].'</td>
					<td style="padding-top:5px;"><img class="imagen" src="../images/'.$fila['imagen'].'" width=50 height=50 /><br>
						<span class="image-tag">'.$fila['imagen'].'</span></td>
					<td>'.$fila['opcion1'].'</td>
					<td>'.$fila['opcion2'].'</td>
					<td>'.$fila['opcion3'].'</td>
					<td><input type="button" value="Actualizar" class="submit3"/></td>
					<td><input type="button" value="Eliminar" class="submit2" onclick="location.href=\'eliminarPreguntaTipoImagen.php?imagen='.$fila['imagen'].'&tema='.$fila['tema'].'&opcion1='.$fila['opcion1'].'&opcion2='.$fila['opcion2'].'&opcion3='.$fila['opcion3'].'\'"/></td>
				</tr>		
				';
	}
	echo
	'
			</table>
		</div>
	';		
}
mysqli_close($conexion);

?>