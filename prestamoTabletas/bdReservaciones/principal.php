
	<head>
		<title>RESERVACIÓN DE TABLETAS ENS</title>
		<link rel="shortcut icon" href="tableta2.ico" />
		<link rel="stylesheet" type="text/css" href="../bdReservaciones/principal.css"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<script type="text/javascript" src="../bdReservaciones/scripts.js"></script>
	</head>
	
	<body>
	<?php
		header('Content-Type: text/html; charset=UTF-8');
		include('../conexion/datosConexion.php');
		
		$pagina="principal";
		$link="Principal";
		
		include('../bdLibroVistas/registrarVisita.php');
	?>	
	<div id="conteynedor">
		<form class ="dark-matter" name="reservacion" method="POST" action="../bdReservaciones/hacerReservacion.php" onsubmit="return validarFormulario();">
			<h1>RESERVACIÓN DE TABLETAS ENS
				<span> Por favor, llene todos los espacios.</span>
			</h1>
			<label>
				<span>Docente:</span>
				<?php
					$tabla="docentes";
					$docente="";
					$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE docenteID=".$_SESSION['docenteID']);
					while($fila=mysqli_fetch_array($sql)){
						$docente=$fila['nombres']." ".$fila['apellidos'];
					}
					echo'<span class="docente">'.$docente.'</span>';
					mysqli_close($conexion);
				?>
			</label>
			<div id="listarAsignaturas">
				<label>
					<span>Asignatura:</span>
					<select name="asignatura" id="asignatura">
					    	<option>Asignatura...</option>
							<?php
								foreach($nombreAsignaturas as $idd =>$asignatura){ 
									echo '
											<option value="'.$asignatura.'">'.$asignatura.'</option>
										';
								}
							?>
					</select>  
				</label>
			</div>
			<div id="listarGrupos">
				<label>
					<span>Grupo:</span>
					<select name="grupo" id="grupo">
					    	<option>Grupo...</option>
							<?php		    
							    foreach($nombreGrupos as $idd =>$grupo){ 
									echo '
											<option value="'.$grupo.'">'.$grupo.'</option>
										';
							    }
							?>
					</select> 
				</label>
			</div>
			<label>
					<span>Fecha:</span>
					<input type="date" id="fecha" name="fecha" onblur="validarFecha(this.value)" style="width:130px">
					<span id="fechaLarga" style="position:relative;float:right;width:200px;right:60px"></span>
			</label>
			<div id=eliminable>
				<div id="idhoras">
					<label>
							<h3>Horas:</h3 >
							<div id="campos" style="position:relative;left:30px;"></div>
					</label>
					<div>
						<ul>
							<li onclick="agregarCampos();" class="add">Añadir horas</li>
							<li onclick="reestablecerCampo();" class="reset">Reestablecer</li>
						</ul>
					</div>
				</div>
			</div>
			
			<label>
				<span style="margin-top:20px">Cantidad:</span>
				<input type="text" name="cantidad" style="width:100px;margin-top:10px" id="cantidad">
				<div id="disponibles" style="position:relative;top:-33px;left:220px;width:200px;"></div>
			</label>
			<div id ="ocultos">
				<input type="hidden" name="horas" id="horas">
				<input type="hidden" name="cantReservadas" id="cantReservadas">
			</div>
			<div style="position:relative;left:300px;display:inline">
				<input value="Cancelar" type="reset" style="width:100px" onclick="reestablecerCampo()" class="button">
				<input value="Enviar" type="submit" style="width:100px" class="button">
			</div>
			</form>
	</div>	
		
		
<?php	
	//Cerrar la conexión.
	mysqli_close($conexion);
?>
	</body>