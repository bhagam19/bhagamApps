<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>LIBROS EN BASE DE DATOS</title>
		<link rel="stylesheet" type="text/css" href="../principal/principal.css"/>
		<script type="text/javascript" src="verBD.js"></script>
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
		$codigo=$_SESSION['permisos'];
		//if($codigo==1||$codigo==2||$codigo==3){
			$pagina="../bdLibros/verBD";
			$link="Base de Datos";
			
			include('../bdLogs/logsEscribir.php');
			include('../conexion/datosConexion.php');
			
			$tabla="libros";				
			@$orderBy=$_GET['orderBy'];				
			if($orderBy){
				$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY ".$orderBy);							
			}else{
				$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);				
			}	
			include('../principal/encabezado.php');	
			echo 
			'
				<div>
					<br>
					<table>
						<tr>
							<td colspan="3"><input style="font-size:18px; color:blue;" type="button" onclick="location.href=\'../principal/principal.php\'" value="Ir a Principal" /></td>
			';				
							if($codigo==1||$codigo==2){
								echo
								'
									<td colspan="3"><input style="font-size:18px; color:blue;" type="button" onclick="location.href=\'formularioNuevoLibro.php\'" value="Agregar Nuevo Libro" /></td>
								';
							}
			echo
			'	
						</tr>
					</table>
				</div>
				<div id="Base-de-Datos">
					<div class="Base-de-Datos">
						BASE DE DATOS:<br><br>
						<table class="tabla-BD" border=1>
							<thead>
								<tr>									
			';
									if($codigo==1){
										echo
										'
											<td></td>
											<td></td>
										';
									}else{
										echo
										'
											<td></td>
										';
									}
									
			echo
			'									
									<td class="encabezado-tabla">Portada</td>
									<td class="encabezado-tabla">Código</td>
									<td class="encabezado-tabla">Coleccion</td>
									<td class="encabezado-tabla">Título</td>
									<td class="encabezado-tabla">Apellidos</td>
									<td class="encabezado-tabla">Nombre</td>
									<td class="encabezado-tabla">Area</td>
									<td class="encabezado-tabla">Materia</td>
									<td class="encabezado-tabla">Especialidad</td>
									<td class="encabezado-tabla">País</td>
									<td class="encabezado-tabla">Año<br>Publicación</td>
									<td class="encabezado-tabla">Volumen</td>								
									<td class="encabezado-tabla">Páginas</td>
									<td class="encabezado-tabla">Cantidad</td>
									<td class="encabezado-tabla">Ejemplar</td>
									<td class="encabezado-tabla">Calidad</td>
									<td class="encabezado-tabla">Usuario</td>
									<td class="encabezado-tabla">Registro</td>	
								</tr>
								<tr>
			';
									if($codigo==1){
										echo
										'
											<td></td>
											<td></td>
											<td></td>
										';
									}else{
										echo
										'
											<td></td>
											<td></td>										
										';
									}
			echo
			'
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=codigo\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=coleccion\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=titulo\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=apellidoAutor\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=nombreAutor\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=areaConocimiento\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=materia\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=especialidad\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=paisAutor\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=yearPublicacion\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=volumen\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=numPaginas\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=cantEjemplares\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=ejemplar\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=calidad\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=usuario\'" style="color:red; font-size:8px;"/></td>	
									<td style="text-align:center"><input type="button" value="▼" onclick="location.href=\'verBD.php?orderBy=fechaRegistro\'" style="color:red; font-size:8px;"/></td>	
									
								</tr>
							</thead>
			';
			while($fila=mysqli_fetch_array($sql)){
				echo 
				'		
								<tr>
									';
									if($codigo==1){
										echo
										'
										<td><input style="padding:0px; margin:0px; font-size:12px; color:red; font-weight:bolder;" type="button" 
											onclick="location.href=\'eliminarLibro.php?fechaRegistro='.$fila["fechaRegistro"].'&usuario='.$fila["usuario"].'&codigo='.$fila["codigo"].'&coleccion='.$fila["coleccion"].'&titulo='.$fila["titulo"].'&apellidoAutor='.$fila["apellidoAutor"].'&nombreAutor='.$fila["nombreAutor"].'&areaConocimiento='.$fila["areaConocimiento"].'&materia='.$fila["materia"].'&especialidad='.$fila["especialidad"].'&paisAutor='.$fila["paisAutor"].'&yearPublicacion='.$fila["yearPublicacion"].'&volumen='.$fila["volumen"].'&numPaginas='.$fila["numPaginas"].'&cantEjemplares='.$fila["cantEjemplares"].'&ejemplar='.$fila["ejemplar"].'&calidad='.$fila["calidad"].'\'" value="Eliminar"/></td>
										<td><input style="padding:0px; margin:0px; font-size:12px; color:green; font-weight:bolder;" type="button" 
											onclick="location.href=\'formularioActualizarLibro.php?fechaRegistro='.$fila["fechaRegistro"].'&usuario='.$fila["usuario"].'&imagen='.$fila["imagen"].'&codigo='.$fila["codigo"].'&coleccion='.$fila["coleccion"].'&titulo='.$fila["titulo"].'&apellidoAutor='.$fila["apellidoAutor"].'&nombreAutor='.$fila["nombreAutor"].'&areaConocimiento='.$fila["areaConocimiento"].'&materia='.$fila["materia"].'&especialidad='.$fila["especialidad"].'&paisAutor='.$fila["paisAutor"].'&yearPublicacion='.$fila["yearPublicacion"].'&volumen='.$fila["volumen"].'&numPaginas='.$fila["numPaginas"].'&cantEjemplares='.$fila["cantEjemplares"].'&ejemplar='.$fila["ejemplar"].'&calidad='.$fila["calidad"].'\'" value="Actualizar"/></td>
										';
									}elseif($codigo==2){
										echo
										'
										<td><input style="padding:0px; margin:0px; font-size:12px; color:green; font-weight:bolder;" type="button" 
											onclick="location.href=\'formularioActualizarLibro.php?fechaRegistro='.$fila["fechaRegistro"].'&usuario='.$fila["usuario"].'&imagen='.$fila["imagen"].'&codigo='.$fila["codigo"].'&coleccion='.$fila["coleccion"].'&titulo='.$fila["titulo"].'&apellidoAutor='.$fila["apellidoAutor"].'&nombreAutor='.$fila["nombreAutor"].'&areaConocimiento='.$fila["areaConocimiento"].'&materia='.$fila["materia"].'&especialidad='.$fila["especialidad"].'&paisAutor='.$fila["paisAutor"].'&yearPublicacion='.$fila["yearPublicacion"].'&volumen='.$fila["volumen"].'&numPaginas='.$fila["numPaginas"].'&cantEjemplares='.$fila["cantEjemplares"].'&ejemplar='.$fila["ejemplar"].'&calidad='.$fila["calidad"].'\'" value="Actualizar"/></td>
										';
									}else{
										echo
										'
										<td><input style="padding:2px; margin:0px; font-size:12px; color:brown; font-weight:bolder;" type="button" 
											value="Reservar"/></td>
										';
									}
									if($fila['imagen']){
										echo
										'
											<td><img src="../portadas/'.$fila['imagen'].'" width=50 height =60></td>
									
										';
									}else{
										echo
											'
												<td></td>
											';
									}
									switch($fila["areaConocimiento"]){
										case "0-Computadoras, información y generales":
											echo '<td style="text-align:center;font-size:14px;background:white;color:black">'.$fila["codigo"].'</td>';
											break;
										case "1-Filosofía y psicología":
											echo '<td style="text-align:center;font-size:14px;background:black;color:white">'.$fila["codigo"].'</td>';
											break;
										case "2-Religión":
											echo '<td style="text-align:center;font-size:14px;background:#FF00DD;color:black">'.$fila["codigo"].'</td>';
											break;
										case "3-Ciencias sociales":
											echo '<td style="text-align:center;font-size:14px;background:red;color:black">'.$fila["codigo"].'</td>';
											break;
										case "4-Lingüistica":
											echo '<td style="text-align:center;font-size:14px;background:lightgreen;color:black">'.$fila["codigo"].'</td>';
											break;
										case "5-Ciencia y matemáticas":
											echo '<td style="text-align:center;font-size:14px;background:lightblue;color:black">'.$fila["codigo"].'</td>';
											break;
										case "6-Tecnología":
											echo '<td style="text-align:center;font-size:14px;background:yellow;color:black">'.$fila["codigo"].'</td>';
											break;
										case "7-Arte y recreación":
											echo '<td style="text-align:center;font-size:14px;background:purple;color:white">'.$fila["codigo"].'</td>';
											break;
										case "8-Literatura":
											echo '<td style="text-align:center;font-size:14px;background:blue;color:white">'.$fila["codigo"].'</td>';
											break;
										case "9-Historia y geografía":
											echo '<td style="text-align:center;font-size:14px;background:brown;color:white">'.$fila["codigo"].'</td>';
											break;									
									}
									echo'								
									<td>'.$fila["coleccion"].'</td>
									<td>'.$fila["titulo"].'</td>
									<td>'.$fila["apellidoAutor"].'</td>
									<td>'.$fila["nombreAutor"].'</td>
									<td>'.$fila["areaConocimiento"].'</td>							
									<td>'.$fila["materia"].'</td>
									<td>'.$fila["especialidad"].'</td>
									<td>'.$fila["paisAutor"].'</td>
									<td>'.$fila["yearPublicacion"].'</td>
									<td>'.$fila["volumen"].'</td>
									<td>'.$fila["numPaginas"].'</td>
									<td>'.$fila["cantEjemplares"].'</td>
									<td>'.$fila["ejemplar"].'</td>
									<td>'.$fila["calidad"].'</td>
									<td>'.$fila["usuario"].'</td>
									<td>'.$fila["fechaRegistro"].'</td>
																
								</tr>
						
				';
			}
			echo 
			'
						</table>
					</div>
				</div>
			</div>
		
		</body>
			';	
			mysqli_close($conexion);		
		/*}else{
			echo 
			"
			Lo siento. No tienes permisos suficientes.<br><br>
			Si crees que deberías poder ingresar a esta opción, ponte en contacto con el administrador.
			<br><br>
			<a href='../principal/principal.php'>VOLVER</a>
			
			";
		}*/	
	}
?>
</html>