<!doctype html>
<?php
	header('Content-Type: text/html; charset=UTF-8');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sistema de Reservación de Tabletas IENS</title>
		<link rel="shortcut icon" href="tableta04.ico" />
		<link rel="stylesheet" media="screen" type="text/css" href="acceso.css"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<script type="text/javascript" src="acceso.js"></script>		
	</head>	
	<body>				
		<div id="contenedor">	
			<div id="cinta" style="margin-bottom:5px;background:#0B6121;color:white;border-radius:10px;font-weight:bold;">
				<ul style="position:relative;list-style:none;display:inline;">
					<li style="position:relative;list-style:none;display:inline;padding:10px;margin:10px;">SISTEMA DE RESERVACIÓN DE TABLETAS - IENS 2015</li>
					<li style="position:relative;list-style:none;display:inline;padding:10px;margin:10px;">Version: 0.1</li>
					<li style="position:relative;list-style:none;display:inline;padding:10px;margin:10px;">Creado por: <a href="https://www.facebook.com/adolfo.ruiz.79" target="_blank" style="text-decoration:none;color:white">Adolfo Ruiz</a></li>
				</ul>					
			</div>
<?php
    session_name("tabletsApp");
	session_start();
    include('encabezado.php');
?>
			<div id="cuerpo-principal">
				<?php
					if(isset($_SESSION['usuario'])){
						$codigo=$_SESSION['permiso'];
						if($codigo==1){
							//Si el usuario está logeado ...
							include('menuNavegacion.php');
							include('../conexion/datosConexion.php');
							
							$tabla='asignaturasxDocente';
							$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
							$contador = 0;
							//Se examina si ya tiene asignaturas registradas a su nombre.
							while($fila=mysqli_fetch_assoc($sql)){
							    if($fila['docenteID'] == $_SESSION['docenteID']){
									$contador++;
							    }
							}
							if($contador==0){
								//Si no tiene asignaturas registradas a su nombre, se carga la lista de todas las asignaturas.
								$peticion=mysqli_query($conexion,"SELECT * FROM asignaturas ORDER BY asignaturaID");
								$nombreAsignaturas=array();
								while($asignatura=mysqli_fetch_assoc($peticion)){
									$nombreAsignaturas[$asignatura['asignaturaID']] = $asignatura['asignatura'];
								}
								
								include('../bdAsignaturasxDocente/formularioAsignaturasxDocente.php'); // Se carga el formulario para registrar asignaturas.
								
								//Se carga la invitación para que el usuario registre las asignaturas a su cargo.
								echo'
									<div id="aviso">
										<span>Registrar las asignaturas que dictas evitará que se listen el total de asignaturas de la institución.</span><br><br>
										<label><li onclick="mostrarFormularios(\'.formularioAsignaturasxDocente\')">Registrar Asignaturas</li></label>
									</div>
								';
								
							}else{
								//Si el usuario ya ha registrado asignaturas a su cargo...
								
								//Se crea un array con los ID de las asignaturas a nombre del usuario.
								$docenteID=$_SESSION['docenteID'];
								$peticion=mysqli_query($conexion,"SELECT * FROM asignaturasxDocente WHERE docenteID=".$docenteID." ORDER BY asignatura");
								$idAsignaturas=array();
								$contador=1;
								while($asignatura=mysqli_fetch_assoc($peticion)){
									$idAsignaturas[$contador] = $asignatura['asignatura'];
									$contador++;
								}
								
								//Se crea un array con el nombre de las asignaturas que corresponden a los ID guardados en el paso anterior.
								$peticion=mysqli_query($conexion,"SELECT * FROM asignaturas ORDER BY asignaturaID");
								$nombreAsignaturas=array();
								$contador=1;
								while($asignatura=mysqli_fetch_assoc($peticion)){
									if($asignatura['asignaturaID']==$idAsignaturas[$contador]){
										$nombreAsignaturas[$contador] = $asignatura["asignatura"];
										$contador++;
									}
								}
							}
							
							$tabla='gruposxDocente';
							$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla); 
							$contador = 0;
							//Se examina si ya tiene grupos registrados a su nombre.
							while($fila=mysqli_fetch_assoc($sql)){
							    if($fila['docenteID'] == $_SESSION['docenteID']){
									$contador++;
							    }
							}
							if($contador==0){
								//Si no tiene grupos registradas a su nombre, se carga la lista de todas los grupos.
								$peticion=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY grupoID");
								$nombreGrupos=array();
								while($grupo=mysqli_fetch_assoc($peticion)){
									$nombreGrupos[$grupo['grupoID']] = $grupo['grupo'];
								}
								
								include('../bdGruposxDocente/formularioGruposxDocente.php'); // Se carga el formulario para registrar grupos.
								
								//Se carga la invitación para que el usuario registre los grupos a su cargo.
								echo'
									<div id="aviso">
										<span>Registrar los grupos a tu cargo evitará que se listen todos los grupos.</span><br><br>
										<label><li onclick="mostrarFormularios(\'.formularioGruposxDocente\')">Registrar Grupos</li></label>
									</div>
								';
								
							}else{
								//Si el usuario ya ha registrado grupos a su cargo...
								
								//Se crea un array con los ID de los grupos a nombre del usuario.
								$docenteID=$_SESSION['docenteID'];
								$peticion=mysqli_query($conexion,"SELECT * FROM gruposxDocente WHERE docenteID=".$docenteID." ORDER BY grupo");
								$idGrupos=array();
								$contador=1;
								while($grupo=mysqli_fetch_assoc($peticion)){
									$idGrupos[$contador] = $grupo['grupo'];
									$contador++;
								}
								
								//Se crea un array con el nombre de los grupos que corresponden a los ID guardados en el paso anterior.
								$peticion=mysqli_query($conexion,"SELECT * FROM grupos ORDER BY grupoID");
								$nombreGrupos=array();
								$contador=1;
								while($grupo=mysqli_fetch_assoc($peticion)){
									if($grupo['grupoID']==$idGrupos[$contador]){
										$nombreGrupos[$contador] = $grupo["grupo"];
										$contador++;
									}
								}
							}
							include('miPerfil.php');
							include('misReservaciones.php');
							include('../bdReservaciones/principal.php');
						}elseif($codigo==3){
							include('menuAdministrador.php');
						}
						
					}else{	
				    	include('../login/formularioLogin.php');
				    	mysqli_close($conexion);
					}
				?>
            </div>		
	</body>	
	<div id="piedepagina">
			   <div class="contenido-piedepagina content">
					<ul>
						<li>© 2015 Sistema de Reservación de Tabletas </li>
						<li style="color:green">Diseñó: <a href="https://www.facebook.com/adolfo.ruiz.79" target="_blank" style="text-decoration:none">Adolfo Ruiz</a></li>
						<li><a href="#">Ayuda</a></li>
					</ul>
			  </div>
	</div>
	<div id="corte">
	</div>
</html>
