<?php

//################### CREAR UNA TABLA DE USUARIOS DOCENTES ###################
	//Establecer conexion
		include('conexion/conectarBD.php');					
	// ================= Crear la tabla "docentes" ==================
	//Preparar consulta SQL
	$tabla='docentes';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			docenteID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(docenteID),
			foto varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci,
			usuario varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			contrasena varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			nombres varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			apellidos varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			edad int(2) NOT NULL,
			correo varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			institucion varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			escudo varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci,
			asignatura1 varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			asignatura2 varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci,
			permisos int(1)
		)";
	//Ejecutar	
	function ejecutarConsulta(){
		global $sql;
		global $conexion;
		global $tabla;
		if(mysqli_query($conexion,$sql)){
			echo 	
				"<div>
					===== CREACIÓN DE LA TABLA '".$tabla."' =====<br><br>
				</div>";
			echo
				"<div> 
					Se creo la tabla <span>'".$tabla."'</span> con exito.<br><br>
				</div>";		
		}else{
			echo 	
				"<div>
					===== CREACIÓN DE LA TABLA '".$tabla."' =====<br><br>
				</div>";
			echo
				"<div> 
					No se pudo crear la tabla <span>'".$tabla."'</span>. Razón: <span>[".mysqli_error()."]</span><br><br>
				</div>";		
		}
	}
	ejecutarConsulta();
//################### CONTENIDO DE PRUEBA PARA LA TABLA DOCENTES. ###################
	
	//Preparar consulta
	$tabla='docentes';
	$sql=
		'
			INSERT INTO '.$tabla.' 
			(foto,usuario,contrasena,nombres,apellidos,edad,correo,
			institucion,escudo,asignatura1,asignatura2,permisos)
			VALUES ("profesor.jpg","profe01","profe01","María Rita","Rodríguez",
			52,"mrita.rod@gmail.com","IER Tapitas","escudoierha.jpg","L. Castellana","Inglés",3)
		';	
	//Insertar
	function insertar(){
		global $sql;
		global $conexion;		
		if(mysqli_query($conexion,$sql)){
			echo 	
				"<div>
					===== CONTENIDO DE PRUEBA =====<br><br>
				</div>";
			echo
				"<div> 
					Se insertaron los datos exitosamente.<br><br>
				</div>";			
		}else{
			echo 	
				"<div>
					===== CONTENIDO DE PRUEBA =====<br><br>
				</div>";
			echo
				"<div> 
					No se insertaron los datos. <span>".mysqli_error()."</span><br><br>
				</div>";		
		}
	}
	insertar();
	
//################### CREAR UNA TABLA DE GRUPOS. ###################

	//Preparar
	$tabla='grupos';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
			usuario varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			contrasena varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			grupo varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL			
		)';		
	//Ejecutar
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA DE GRUPOS. ###################
	
	//Preparar
	$tabla='grupos';
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,grupo)
			VALUES ("profe01","profe01","6-1")
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,grupo)
			VALUES ("profe01","profe01","7-1")
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,grupo)
			VALUES ("profe01","profe01","8-1")
		';	
	//Insertar
	insertar();

//################### CREAR UNA TABLA DE ESTUDIANTES. ###################

	//Preparar
	$tabla='estudiantes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
			usuario varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			contrasena varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			grupo varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			nombres varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			apellidos varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			edad int(2) NOT NULL				
		)';		
	//Ejecutar
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA DE GRUPOS. ###################
	
	//Preparar
	$tabla='estudiantes';
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,grupo,nombres,apellidos,edad)
			VALUES ("profe01","profe01","6-1","Daniel Alberto","Arango Cifuentes",10)
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,grupo,nombres,apellidos,edad)
			VALUES ("profe01","profe01","6-1","Laura Vanessa","Cruz Rendón",11)
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,grupo,nombres,apellidos,edad)
			VALUES ("profe01","profe01","6-1","Simón","Cachope Rios",10)
		';	
	//Insertar
	insertar();
		
	
//################### CREAR UNA TABLA TIPOIMAGEN. ###################

	//Preparar
	$tabla='tipoImagen';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
			usuario varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			contrasena varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			asignatura varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			tema varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			imagen varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			opcion1 varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			opcion2 varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			opcion3 varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL				
		)';		
	//Ejecutar
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA DE GRUPOS. ###################
	
	//Preparar
	$tabla='tipoImagen';
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,asignatura,tema,imagen,opcion1,opcion2,opcion3)
			VALUES ("profe01","profe01","Inglés","Occupations","teacher.jpg","a teacher","a doctor","a vet")
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,asignatura,tema,imagen,opcion1,opcion2,opcion3)
			VALUES ("profe01","profe01","Inglés","Animals","dog.jpg","a dog","a cow","an ostrich")
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,asignatura,tema,imagen,opcion1,opcion2,opcion3)
			VALUES ("profe01","profe01","Inglés","Class Objects","pencil.jpg","a pencil","an eraser","a door")
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,asignatura,tema,imagen,opcion1,opcion2,opcion3)
			VALUES ("profe01","profe01","Inglés","People","baby.jpg","a baby","a girl","a man")
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario,contrasena,asignatura,tema,imagen,opcion1,opcion2,opcion3)
			VALUES ("profe01","profe01","Inglés","Daily Routine","wake up.jpg","wake up","take a shower","go to school")
		';	
	//Insertar
	insertar();
		
//################### CREAR UNA TABLA DE LOGS. ###################
	
	//Preparar
	$tabla='logs';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
			utc int,
			anio varchar(4),
			mes varchar(2),
			dia varchar(2),
			hora varchar(2),
			minuto varchar(2),
			segundo varchar(2),
			ip varchar(50),
			navegador varchar(100),
			usuario varchar(40),
			contrasena varchar(40),
			pagVisitada varchar(200)

		)';		
	//Ejecutar	
	ejecutarConsulta();
		
//################### CONTENIDO DE PRUEBA PARA LA TABLA DE LOGS. ###################
	
	//Preparar
	$tabla='logs';
	$sql=
		'
			INSERT INTO '.$tabla.' (utc, anio, mes, dia, hora, minuto, segundo, ip, navegador, usuario, contrasena,pagVisitada)
			VALUES (0000000000,2011,02,07,21,03,00,"127.0.0.1","chrome","profe01","profe01","<a href=http://../principal.php>principal</a>")			
		';	
	//Insertar
	insertar();
	
	//Cerrar
	mysqli_close($conexion);
	
	echo 	
				"<div>
					===== INSTALACIÓN FINALIZADA =====<br><br>
					<a href='index.php'>Volver</a>
				</div>";

?>