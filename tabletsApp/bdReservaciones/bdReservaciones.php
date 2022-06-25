<html style="background:#F2F2F2">
	<head>
		<title>Administración de Reservaciones</title>
		<link rel="shortcut icon" href="../principal/tableta04.ico" />
		<link rel="stylesheet" type="text/css" href="principal.css"/>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	
	<?php
		session_name("presTablet");
		session_start();
		if(isset($_SESSION['usuario'])){
			$codigo=$_SESSION['permiso'];
			if($codigo==1){
				echo'
					<script>alert("Lo sentimos, no tiene permisos suficientes para esta opción.");</script>
					<html>
						<head>
							<meta HTTP-equiv=\'REFRESH\' content=\'0;url=principal/acceso.php\'>
						</head>
					</html>
					';
			}else{
				header('Content-Type: text/html; charset=UTF-8');
				include('../conexion/datosConexion.php');
				//Establecer y Ejecutar la consulta.
				echo '
		<body style="width:850px;margin:0 auto;">
				<h1>ADMINISTRACIÓN DE RESERVACIONES</h1>
			<div id="volver">
				<ul style="list-style:none;display:inline">
					<li style="display:inline"><a href=\'../principal/acceso.php\'>Volver</a></li>
				</ul>
			</div>
				<div id="contenedor">
					<div class="formularioReservaciones">
						<div style="overflow:auto;!important">
						<table border="1" style="width:1200px;!important">
								<caption>AGREGAR NUEVA RESERVACIÓN</caption>
									<thead style="background:lightblue">
										<tr>
											<th id="encabezado">DOCENTE</th>
											<th id="encabezado">ASIGNATURA</th>
											<th id="encabezado">GRUPO</th>
											<th id="encabezado">FECHA</th>
											<th id="encabezado" style="width:200px;!important">HORA RESERVADA</th>
											<th id="encabezado">CANTIDAD</th>
										</tr>
									</thead>
									<tbody style="background:lightgreen">
						';
						$peticion1=mysqli_query($conexion,"SELECT * FROM docentes ORDER BY apellidos");
						$docentes=array();
						while($docente=mysqli_fetch_assoc($peticion1)){
							$docentes[$docente["docenteID"]] = $docente["apellidos"].' '.$docente["nombres"];
						}
						
						$peticion2=mysqli_query($conexion,"SELECT * FROM asignaturas ORDER BY asignaturaID");
						$asignaturas=array();
						while($asignatura=mysqli_fetch_assoc($peticion2)){
							$asignaturas[$asignatura["asignaturaID"]] = $asignatura["asignatura"];
						}
				        
				        $peticion3=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY grupoID");
						$grupos=array();
						while($grupo=mysqli_fetch_assoc($peticion3)){
							$grupos[$grupo["grupoID"]] = $grupo["grupo"];
						}		
						$tabla = 'tabletas';
						$consulta = mysqli_query($conexion,"SELECT * FROM ".$tabla." ORDER BY tabletaID");
		
						echo
							'<tr>
								<form name="reservacion" method="POST" action="hacerReservacion.php" onsubmit="return validarFormulario();">
								<td><select name="nombre" id="nombre">
								    <option>Docente...</option>
								    ';
								    foreach($docentes as $idd =>$docente){ 
										echo '
											<option value="'.$idd.'">'.$docente.'</option>
										';
									}
								echo'
								</select>    
								</td>
								<td><select name="asignatura" id="asignatura">
								    <option>Asignatura...</option>
								    ';
								    foreach($asignaturas as $idd =>$asignatura){ 
										echo '
											<option value="'.$asignatura.'">'.$asignatura.'</option>
										';
									}
								echo'
								</select>    
								</td>
								<td><select name="grupo" id="grupo">
								    <option>Grupo...</option>
								    ';
								    foreach($grupos as $idd =>$grupo){ 
										echo '
											<option value="'.$grupo.'">'.$grupo.'</option>
										';
									}
								echo'
								</select>    
								</td>
								<td><input type="date" id="fecha" name="fecha" onblur="" style="width:130px"></td>
								<td>
									<div id="eliminable2">
										<div id="idhoras2">
											<div id="campos" style="position:relative;width:80px;top:20px;left:20px;"></div>
											<div>
												<ul style="display:inline">
													<li onclick="agregarCampos();"  style="cursor:pointer" class="add">Añadir</li>
													<li onclick="reestablecerCampo2();" style="cursor:pointer" class="reset">Reestablecer</li>
												</ul>
											</div>
										</div>
									</div>
								</td>
								<td><span id="disponibles" style="font-size:12px">*Disponibles</span></br> <input type="text" name="cantidad" style="width:100px" id="cantidad"></td>
								<td>
									<input type="hidden" name="horas" id="horas">
									<input type="hidden" name="cantReservadas" id="cantReservadas">
									<input value="Enviar" type="submit" style="width:70px">
									<input value="Cancelar" type="reset" style="width:70px" onclick="reestablecerCampo2()">
								</td>
								</form>
							</tr> 
							</tbody>
						</table>
						</div>
							</br>
							
					<div style="height:380px;overflow:auto">
					<table class="tabla">
							<caption>REGISTRO DE RESERVACIONES HECHAS ("Click" para imprimir).</caption>
							<thead>
								<tr>
									<th id="encabezado">ID</th>
									<th id="encabezado">DOCENTE</th>
									<th id="encabezado">ASIGNATURA</th>
									<th id="encabezado">GRUPO</th>
									<th id="encabezado">FECHA</th>
									<th id="encabezado">HORA RESERVADA</th>
									<th id="encabezado">CANTIDAD</th>
								</tr>
							</thead>
						';
						$tabla='reservaciones';
						$consultaSql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
						echo'<tbody title="Click para imprimir." class="tooltip">';
				
						while($fila=mysqli_fetch_array($consultaSql)){	
							$sql2=mysqli_query($conexion,"SELECT * FROM docentes WHERE docenteID=".$fila['docenteID']);
							while($fila2=mysqli_fetch_array($sql2)){
								$docente=$fila2['nombres']." ".$fila2['apellidos'];
							}
							echo 
							'
								<tr  onclick="location.href=\'../bdReservaciones/mostrarReserva.php?id='.$fila["reservacionID"].'&pag=..'.$_SERVER["PHP_SELF"] .'\'">
									<td>'.$fila["reservacionID"].'</td>
									<td>'.mb_convert_case($docente, MB_CASE_TITLE, "UTF-8").'</td>
									<td>'.mb_convert_case($fila["asignatura"], MB_CASE_TITLE, "UTF-8").'</td>
									<td>'.$fila["grupo"].'</td>
									';
									
								$fecha=strtotime($fila['fecha']);
								$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
								$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				 
							echo'
									<td>'.$dias[date('w',$fecha)].", ".date('d',$fecha)." de ".$meses[date('n',$fecha)-1].'</td>
									<td>'.$fila["hora"].'</td>
									<td>'.$fila["cantidad"].'</td>
								</tr>
							';			
						}
						
						echo '
								</tbody>
							</table>
							</div>
						</div>
					</div>	
						
						';
			}
		}else{
		    echo'
					<script>alert("Lo sentimos, no tiene permisos suficientes para esta opción.");</script>
					<html>
						<head>
							<meta HTTP-equiv=\'REFRESH\' content=\'0;url=../principal/acceso.php\'>
						</head>
					</html>
					';
		}
	
	//Cerrar la conexión.
	mysqli_close($conexion);
	?>
	
	</body>

</html>