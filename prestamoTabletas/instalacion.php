<html>
	<head>
		<link rel="stylesheet" type="text/css" href="conexion/instalacion.css">
	</head>

	<body>
<?php

//Establecer conexion
	include('conexion/datosConexion.php');

	echo "<div> <a href='index.php'>Volver</a> || <a href='mostrarTablasenBD.php'>Mostrar Base de Datos</a> <br><br></div>";
	echo "<div> <H1>===== RESUMEN DE INSTALACIÓN ===== </H1><br><br></div>";

//################### Creamos las funciones ejecutarConsulta() e insertar(). ###################		
function ejecutarConsulta(){
	global $sql;
	global $conexion;
	global $tabla;
	if (mysqli_query($conexion,$sql)){
		echo "<div>===== CREACIÓN DE LA TABLA '".$tabla."' =====<br><br></div>";
		echo "<div> Se creo la tabla <span>'".$tabla."'</span> con exito.<br><br></div>";		
	}else{
		echo "<div>===== CREACIÓN DE LA TABLA '".$tabla."' =====<br><br></div>";
		echo "<div>No se pudo crear la tabla <span>'".$tabla."'</span>. Razón: <span>[".mysqli_error($conexion)."]</span><br><br></div>";		
	}
}
	
function insertar(){
	global $sql;
	global $conexion;		
	if(mysqli_query($conexion,$sql)){
		echo "<div>===== CONTENIDO DE PRUEBA =====<br><br></div>";
		echo "<div>Se insertaron los datos exitosamente.<br><br></div>";			
	}else{
		echo "<div>===== CONTENIDO DE PRUEBA =====<br><br></div>";
		echo "<div>No se insertaron los datos. <span>".mysqli_error($conexion)."</span><br><br></div>";		
	}
}	

//########## CREAR UNA TABLA DE "INSTALACION" ##########
	// Preparamos la consulta SQL
	$tabla = 'instalacion';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				codInstalacion int(1) NOT NULL,
				PRIMARY KEY(codInstalacion),
				confirmacion int(1) NOT NULL
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "INSTALACION" ##########
	
	$sql='INSERT INTO '.$tabla.' (codInstalacion, confirmacion) 
			VALUES (1,1)';
			insertar();		

//######################### CREAR UNA TABLA DE USUARIOS #####################################
    // ===================== Preparar una tabla "usuarios" ============================
	//Preparar consulta SQL
	$tabla='usuarios';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			usuarioID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(usuarioID),
			docenteID int(2) NOT NULL,
			usuario varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			contrasena varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			permiso int(1) NOT NULL DEFAULT '1'
		)";
	
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA USUARIOS. ###################
	//Preparar consulta
	$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);
	$salt = strtr($salt, array('+' => '.')); 
	$hash = crypt("admin1234", "$2y$10$" . $salt);
	$tabla='usuarios';
	$sql='INSERT INTO '.$tabla.' (docenteID,usuario,contrasena,permiso) VALUES (0,"superadmin","'.$hash.'",3)';
	
	insertar();
	
//######################### CREAR UNA TABLA DE ASIGNATURASXDOCENTE #####################################
    // ===================== Preparar una tabla "asignaturasxDocente" ============================
	//Preparar consulta SQL
	$tabla='asignaturasxDocente';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			asignaturaID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(asignaturaID),
			usuarioID int(2) NOT NULL,
			docenteID  int(2) NOT NULL,
			asignatura int(2)  NOT NULL
		)";
	
	ejecutarConsulta();
	
//######################### CREAR UNA TABLA DE GRUPOSXDOCENTE #####################################
    // ===================== Preparar una tabla "gruposxDocente" ============================
	//Preparar consulta SQL
	$tabla='gruposxDocente';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			grupoID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(grupoID),
			usuarioID int(2) NOT NULL,
			docenteID  int(2) NOT NULL,
			grupo int(2)  NOT NULL
		)";
	
	ejecutarConsulta();
	
//######################### CREAR UNA TABLA DE DOCENTES #####################################
    // ===================== Preparar una tabla "docentes" ============================
	//Preparar consulta SQL
	$tabla='docentes';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			docenteID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(docenteID),
			nombres varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			apellidos varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
		)";
	
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA DOCENTES. ###################
	//Preparar consulta
	$tabla='docentes';
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ABADIA PALACIO","YAIRA MILENA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ALBORNOZ MOSQUERA","LUZ EDILIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ALZATE MORA","JORGE ALBERTO")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ANDRADE CÓRDOBA","WALTER YANY")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("BARRIENTOS OCAMPO","NUBIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("BERMÚDEZ GONZALEZ","ELIANA MARÍA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("BERMÚDEZ","MARÍA CECILIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("BETANCUR","CARLOS ENRIQUE")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("BETANCUR RESTREPO","BIVIANA MARCELA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("BUILES BUILES","MARTHA LUCIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("CADAVID RESTREPO","BLANCA OLIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("CARDONA HINCAPIÉ","MÓNICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("CUERVO PUERTA","LUIS FERNANDO")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ESTRADA CARVAJAL","LUZ YAMID")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ESTRADA CARVAJAL","MARTHA ELENA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("FRANCO GIRALDO","BERENICE")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("GALEANO VÁSQUEZ ","JHON JAIRO")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("GALLEGO DÍAZ","ROSA ELENA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("GARZÓN DUQUE","SONIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("GÓEZ ZAPATA","OMAIRA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("HERNÁNDEZ","ELKIN")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("HERNÁNDEZ","RAFAEL")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("MESA DUQUE","BEATRIZ EUGENIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("MESA PULGARÍN","EFRAIN FERNANDO")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("MONSALVE PÉREZ","RUTH MORELIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("MOSQUERA CÓRDOBA","LUIS XAVIER")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("OBANDO OSORIO","VIVIANA ELENA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("OLAYA LÓPEZ","VICTOR ALFONSO")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ORTEGA GUISAO","ELKIN DE JESÚS")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("OSORIO NARANJO","SONIA ELENA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("PÉREZ GUISAO","LUZ AMPARO")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("RIVAS PEREA","YAKELIN")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("ROJO RESTREPO","LUIS ALBERTO")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("RUIZ HERNÁNDEZ","ADOLFO LEÓN")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("SIERRA SERNA","MARYLUZ")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("VALENCIA CATAÑO","MARTHA ALBA")';insertar();
	$sql='INSERT INTO '.$tabla.' (apellidos,nombres) VALUES ("VALENCIA GARCÍA","SANDRA MILENA")';insertar();
	
	
//######################### CREAR UNA TABLA DE ASIGNATURAS #####################################
    // ===================== Preparar una tabla "asignaturas" ============================
	//Preparar consulta SQL
	$tabla='asignaturas';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			asignaturaID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(asignaturaID),
			asignatura varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
		)";
	
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA ASIGNATURAS. ###################
	//Preparar consulta
	$tabla='asignaturas';
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("CIENCIAS NATURALES")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("CIENCIAS SOCIALES")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("CULTURA PEDAGÓGICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DESARROLLO HUMANO")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LA ARTÍSTICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LA EDUCACIÓN FÍSICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LA EDUCACIÓN RELIGIOSA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LA ÉTICA Y VALORES")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LA LENGUA CASTELLANA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LAS CIENCIAS NATURALES")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LAS CIENCIAS SOCIALES")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LAS MATEMÁTICAS")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DE LAS TIC")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA DEL INGLÉS")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIDÁCTICA GENERAL")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIMENSIÓN AMBIENTAL")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIMENSIÓN COGNITIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIMENSIÓN COMUNICATIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIMENSIÓN CORPORAL")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIMENSIÓN ESPIRITUAL Y ÉTICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIMENSIÓN ESTÉTICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DIMENSIÓN SOCIOAFECTIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("DISEÑO CURRICULAR")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EDUCACIÓN ARTÍSTICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EDUCACIÓN ÉTICA Y VALORES")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EDUCACIÓN FÍSICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EDUCACIÓN PARA LA DIVERSIDAD")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EDUCACIÓN PARA LA RURALIDAD")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EDUCACIÓN RELIGIOSA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EPISTEMOLOGÍA Y PEDAGOGÍA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("ESPAÑOL")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("ÉTICA Y PERFIL DEL MAESTRO")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("EVALUACIÓN DEL APRENDIZAJE")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("FILOSOFÍA GENERAL")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("FÍSICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("FORMACIÓN HUMANA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("FUNDAMENTOS DE PREESCOLAR")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("GESTIÓN EDUCATIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("HISTORIA DE LA EDUCACIÓN Y LA PEDAGOGÍA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("HISTORIA Y POLÍTICAS DE INFANCIA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("IDENTIDAD NORMALISTA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("INCLUSIÓN EDUCATIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("INGLÉS")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("INVESTIGACIÓN EN EL CONTEXTO")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("LEGISLACIÓN EDUCATIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("MATEMÁTICAS")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("MEDIO AMBIENTE")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("PEDAGOGÍAS CONTEMPORANEAS")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("PRÁCTICA PEDAGÓGICA INVESTIGATIVA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("PROCESOS DE LECTURA Y ESCRITURA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("PROCESOS LÓGICO MATEMÁTICOS")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("PROYECTO DE VIDA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("PSICOLOGÍA DEL APRENDIZAJE")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("PSICOLOGÍA GENERAL")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("QUÍMICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("SOCIOLOGÍA DE LA EDUCACIÓN")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("TECNOLOGÍA E INFORMÁTICA")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("TEORÍAS Y ENFOQUES CURRICULARES")';insertar();
	$sql='INSERT INTO '.$tabla.' (asignatura) VALUES ("URBANIDAD Y CIVISMO")';insertar();
	
//######################### CREAR UNA TABLA DE GRUPOS #####################################
    // ===================== Preparar una tabla "grupos" ============================
	//Preparar consulta SQL
	$tabla='grupos';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			grupoID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(grupoID),
			grupo varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
		)";
	
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA GRUPOS. ###################
	//Preparar consulta
	$tabla='grupos';
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("TrA")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("TrB")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("1°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("1°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("2°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("2°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("3°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("3°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("4°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("4°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("5°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("5°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("6°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("6°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("7°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("7°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("7°C")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("8°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("8°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("9°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("9°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("10°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("10°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("11°A")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("11°B")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("FCINI")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("FCI")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("FCII")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("FCIII")';insertar();
	$sql='INSERT INTO '.$tabla.' (grupo) VALUES ("FCIV")';insertar();

//######################### CREAR UNA TABLA DE TABLETAS #####################################
    // ===================== Preparar una tabla "tabletas" ============================
	//Preparar consulta SQL
	$tabla='tabletas';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			tabletaID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(tabletaID),
			serial varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			estado int(1) NOT NULL DEFAULT '1'
		)";
	
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA TABLETAS. ###################
	//Preparar consulta
	$tabla='tabletas';
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103801")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103802")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103803")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103804")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103805")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103806")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103807")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103808")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103809")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310103810")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107581")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107582")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107583")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107584")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107585")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107586")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107587")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107588")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107589")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T310107590")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092531")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092532")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092533")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092534")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092535")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092536")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092537")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092538")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092539")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31092540")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093091")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093092")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093093")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093094")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093095")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093096")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093097")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093098")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093099")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31093100")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095381")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095382")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095383")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095384")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095385")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095386")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095387")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095388")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095389")';insertar();
	$sql='INSERT INTO '.$tabla.' (serial) VALUES ("T31095390")';insertar();
	
		
//######################### CREAR UNA TABLA DE RESERVACIONES #####################################
    // ===================== Preparar una tabla "reservaciones" ============================
	//Preparar consulta SQL
	$tabla='reservaciones';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			reservacionID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(reservacionID),
			docenteID int(2) NOT NULL,
			asignatura varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			grupo varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			fecha date NOT NULL,
			hora varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			cantidad int(3) NOT NULL,
			seriales varchar(2000) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
		)";
	
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA RESERVACIONES. ###################
	//Preparar consulta
	/*
	$tabla='reservaciones';
	$sql='INSERT INTO '.$tabla.' (docenteID,asignatura,grupo,fecha,hora,cantidad,seriales) 
		VALUES (34,"Inglés","11°B","2015-03-09","1a Hora, 2a Hora",2,"T8956789 (buena), T8987809 (buena)")';
		
	insertar();
	
	$sql='INSERT INTO '.$tabla.' (docenteID,asignatura,grupo,fecha,hora,cantidad,seriales) 
		VALUES (35,"Inglés","10°B","2015-03-09","1a Hora",3,"T8956789 (buena), T8987809 (buena)")';
		
	insertar();
	
	$sql='INSERT INTO '.$tabla.' (docente,asignatura,grupo,fecha,hora,cantidad,seriales) 
		VALUES ("Valencia Cataño Martha Alba","Ciencias Sociales","9°B","2015-03-09","2a Hora",5,"T8956789 (buena), T8987809 (buena)")';
		
	insertar();
	*/
	//Cerrar
	mysqli_close($conexion);
	
	echo 	
				"<div>
					===== INSTALACIÓN FINALIZADA =====<br><br>
					<a href='index.php'>Volver</a>
				</div>";
?>