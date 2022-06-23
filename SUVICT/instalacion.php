<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../conexion/instalacion.css">
		<link rel="stylesheet" type="text/css" href="conexion/instalacion.css">
	</head>
	<body>
<?php
	
	//Establecer conexion
	$url = $_SERVER['PHP_SELF'];//Para saber si la instalacion se ejecuta desde adentro o fuera de la aplicacion.	
	include('conexion/datosConexion.php');
	echo"<br><br><br><br><br>";
	if(strpos($url,"principal")){
		echo "<div id='instalacion'> <a href='principal.php'>Volver</a><br></div>";
		echo "<div id='instalacion'> <H1>===== RESUMEN DE INSTALACIÓN ===== </H1><br><br></div>";
	}else{
		echo "<div id='instalacion'> <a href='index.php'>Volver</a> || <a href='mostrarTablasenBD.php'>Mostrar Base de Datos</a> <br><br></div>";
		echo "<div id='instalacion'> <H1>===== RESUMEN DE INSTALACIÓN ===== </H1><br><br></div>";
	}
//################### Creamos las funciones ejecutarConsulta() e insertar(). ###################		
function ejecutarConsulta(){
	global $sql;
	global $conexion;
	global $tabla;
	if (mysqli_query($conexion,$sql)){
		echo "<div id='instalacion'>===== CREACIÓN DE LA TABLA '".$tabla."' =====<br><br></div>";
		echo "<div id='instalacion'> Se creo la tabla <span id='span'>'".$tabla."'</span> con exito.<br><br></div>";		
	}else{
		echo "<div id='instalacion'>===== CREACIÓN DE LA TABLA '".$tabla."' =====<br><br></div>";
		echo "<div id='instalacion'>No se pudo crear la tabla <span id='span'>'".$tabla."'</span>. Razón: <span>[".mysqli_error($conexion)."]</span><br><br></div>";		
	}
}	
function insertar(){
	global $sql;
	global $conexion;		
	if(mysqli_query($conexion,$sql)){
		echo "<div id='instalacion'>===== CONTENIDO DE PRUEBA =====<br><br></div>";
		echo "<div id='instalacion'>Se insertaron los datos exitosamente.<br><br></div>";			
	}else{
		echo "<div id='instalacion'>===== CONTENIDO DE PRUEBA =====<br><br></div>";
		echo "<div id='instalacion'>No se insertaron los datos. <span id='span'>".mysqli_error($conexion)."</span><br><br></div>";		
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
//################### CREAR UNA TABLA DE "DOCENTES". ###################
	//Preparar consulta SQL
	$tabla='docentes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			cod int NOT NULL AUTO_INCREMENT,			
			ID int(11) NOT NULL,
			apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			usuario varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			contrasena varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			genero int(1) NOT NULL,
		    permiso int(1) NOT NULL,
			PRIMARY KEY(cod)
		)';	
	//Ejecutar	
	ejecutarConsulta();	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "DOCENTES". ###################
	$usuarios = array( 
		array(59823938,"Bolaños Ramos","Mónica Esther",59823938,"cteApp",0,1),
		array(24866257,"Ospina Hoyos","Judith",24866257,"cteApp",0,1),
		array(21812797,"Morales Piedrahita","Gladys Elena",21812797,"cteApp",0,1),
		array(1017137256,"Restrepo Rios ","Jhon Fredy",1017137256,"cteApp",1,1),
		array(43287642,"Restrepo Piedrahita ","Paula Andrea",43287642,"cteApp",0,1),
		array(43717986,"Quiroz Urrego","Leidy Johana",43717986,"cteApp",0,1),
		array(1027885001,"Jaramillo Rondón","Duvany Alberto",1027885001,"cteApp",1,1),
		array(43347795,"Cuesta Perea","Belma Judith",43347795,"cteApp",0,1),
		array(43412906,"Puerta Millan","Maria Teresa",43412906,"cteApp",0,1),
		array(71876942,"Tamayo Cano","Augusto De Jesús",71876942,"cteApp",1,1),
		array(1069466233,"Alvarez Madrid","Victor Hugo",1069466233,"cteApp",1,1),
		array(82363294,"Perea Perea","Hadinson Aurelio",82363294,"cteApp",1,1),
		array(80772630,"Sánchez García","Diego Ancizar",80772630,"cteApp",1,1),
		array(71190679,"Zapata Ibañez","Jose Hernando",71190679,"cteApp",1,1),
		array(15531390,"Alvarez Patiño","Marco Didier",15531390,"cteApp",1,1),
		array(12020303,"Rodríguez Mena","Dairon",12020303,"cteApp",1,1),
		array(1070815702,"Mercado Arteaga","Enisenia",1070815702,"cteApp",0,1),
		array(43512182,"Londoño Correa","Gloria Estela ",43512182,"cteApp",0,1),
		array(21831707,"Garces Correal","Angela Maria",21831707,"cteApp",0,1),
		array(15528638,"Restrepo Flórez","Jaime Alberto",15528638,"cteApp",1,1),
		array(26274529,"Perea Mosquera","Dilia María",26274529,"cteApp",0,1),
		array(1143133661,"Castro Julio","Hayder Jhoel",1143133661,"cteApp",1,1),
		array(1077425509,"Palacios Cordoba","Lesly Johana",1077425509,"cteApp",0,1),
		array(8406926,"Monsalve Ochoa","John Arcesio",8406926,"cteApp",1,1),
		array(26260545,"Palacios Moreno","Marcela Patricia ",26260545,"cteApp",0,1),
		array(72187311,"De La Cruz Ortíz","Juan Carlos",72187311,"cteApp",1,1),
		array(43986821,"Cadavid Tapias","Deisy Yolima",43986821,"cteApp",0,1),
		array(70812696,"Arango Díez","Wilmar de Jesús",70812696,"cteApp",1,1),
		array(32111222,"Cardona Alvarez","Bibiana Marcela",32111222,"cteApp",0,1),
		array(21461285,"Giraldo Arroyave","Gloria Luzdary",21461285,"cteApp",0,1),
		array(43289811,"Uribe Zuleta","Maribel",43289811,"cteApp",0,1),
		array(30383701,"Montoya Castaño","Amparo ",30383701,"cteApp",0,1),
		array(1045110098,"Restrepo Alzate","Leidy Johana",1045110098,"cteApp",0,1),
		array(71878900,"Mondragón Mondragón","Fabio Nelson",71878900,"cteApp",1,1),
		array(43289701,"Muñoz Gutiérrez","Diana Marcela",43289701,"cteApp",0,1),
		array(1027880650,"Franco Carmona","Cielo Margarita",1027880650,"cteApp",0,1),
		array(78115091,"Moncaleano Monterrosa","Ricardo ",78115091,"cteApp",1,1),
		array(71379517,"Ruiz Hernández","Adolfo León",71379517,"cteApp",1,3),
		array(70877012,"Gallo Mesa","Oscar Fernando",70877012,"cteApp",1,1)
		);	
	foreach ($usuarios as $usuario){
		$sql='INSERT INTO '.$tabla.' (id, apellidos, nombres, usuario, contrasena, genero, permiso) 
			VALUES ('.$usuario[0].',"'.$usuario[1].'","'.$usuario[2].'","'.$usuario[3].'","'.$usuario[4].'",'.$usuario[5].','.$usuario[6].')';
			insertar();		
	}
//########## CREAR UNA TABLA DE "AREAS" ##########
	// Preparamos la consulta SQL
	$tabla = 'areas';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				area varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(cod)			
			)
		';
	//Ejecutar
	ejecutarConsulta();
//########## INGRESAR CONTENIDO A LA TABLA "AREAS" ##########
	$areas = array(
		array("Ciencias Naturales, Física y Química"),
		array("Ciencias Sociales, Económicas, Políticas"),
		array("Educación Artística y Cultural"),
		array("Educación Física, Recreación y Deporte"),
		array("Educación Religiosa, Ética y Valores, Filosofía"),
		array("Emprendimiento y Empresarismo"),
		array("Lengua Castellana, Idioma Extranjero (inglés)"),
		array("Matemáticas, Contabilidad, Estadística"),
		array("Metodología de la Investigación, Proyecto de Grado"),
		array("Tecnología, Informática, Programación")
		);	
	foreach ($areas as $area){
		$sql='INSERT INTO '.$tabla.' (area) 
			VALUES ("'.$area[0].'")';
			insertar();		
	}
//########## CREAR UNA TABLA DE "ASIGNATURAS" ##########
	// Preparamos la consulta SQL
	$tabla = 'asignaturas';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				asignatura varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				codArea int,
				PRIMARY KEY(cod),
				FOREIGN KEY(codArea) REFERENCES areas (cod)			
			)
		';
	//Ejecutar
	ejecutarConsulta();
//########## INGRESAR CONTENIDO A LA TABLA "ASIGNATURAS" ##########
	if(strpos($url,"principal")){
		$instalacion=0;
	}else{
		$instalacion=1;
	}
	include('bdAsignaturas/cargarExcel.php'); 
//########## CREAR UNA TABLA DE "SEDES" ##########
	// Preparamos la consulta SQL
	$tabla = 'sedes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				sede varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(cod)			
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "SEDES" ##########
	$sedes = array(
		array("Sede Julio Jiménez"),
		array("Sede La Lejía"),
		array("Sede La Melliza"),
		array("Sede Monteverde"),
		array("Sede Ricardo González"),
		array("Sede Principal")
		);
	
	foreach ($sedes as $sede){
		$sql='INSERT INTO '.$tabla.' (sede) 
			VALUES ("'.$sede[0].'")';
			insertar();		
	}

//########## CREAR UNA TABLA DE "GRUPOS" ##########
	// Preparamos la consulta SQL
	$tabla = 'grupos';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				grupo varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(cod)			
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "GRUPOS" ##########
	$grupos = array(
		array("00A"),
		array("00B"),
		array("01A"),
		array("01B"),
		array("02A"),
		array("02B"),
		array("03A"),
		array("03B"),
		array("04A"),
		array("04B"),
		array("05A"),
		array("05B"),
		array("06A"),
		array("06B"),
		array("06C"),
		array("07A"),
		array("07B"),
		array("08A"),
		array("08B"),
		array("09A"),
		array("09B"),
		array("10A"),
		array("10B"),
		array("11A"),
		array("11B"),
		array("C03A"),
		array("C03B"),
		array("C04A"),
		array("C05A"),
		array("C06A"),
		array("00 SJJ"),
		array("01 SJJ"),
		array("02 SJJ"),
		array("03 SJJ"),
		array("04 SJJ"),
		array("05 SJJ"),
		array("00 SLL"),
		array("01 SLL"),
		array("02 SLL"),
		array("03 SLL"),
		array("04 SLL"),
		array("05 SLL"),
		array("00 SLM"),
		array("01 SLM"),
		array("02 SLM"),
		array("03 SLM"),
		array("04 SLM"),
		array("05 SLM"),
		array("00 SMV"),
		array("01 SMV"),
		array("02 SMV"),
		array("03 SMV"),
		array("04 SMV"),
		array("05 SMV"),
		array("06 SMV"),
		array("07 SMV"),
		array("08 SMV"),
		array("09 SMV"),
		array("10 SMV"),
		array("00 SRG"),
		array("01 SRG"),
		array("02 SRG"),
		array("03 SRG"),
		array("04 SRG"),
		array("05 SRG")

		);
	
	foreach ($grupos as $grupo){
		$sql='INSERT INTO '.$tabla.' (grupo) 
			VALUES ("'.$grupo[0].'")';
			insertar();		
	}

//########## CREAR UNA TABLA DE "ASIGNACIÓN ACADÉMICA" ##########
	// Preparamos la consulta SQL
	$tabla = 'asignacionAcademica';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				docente int(2) NOT NULL,
				asignatura int(2)  NOT NULL,
				grupo int(2) NOT NULL,
				PRIMARY KEY(cod),
				FOREIGN KEY(docente) REFERENCES docentes (cod),
				FOREIGN KEY(asignatura) REFERENCES asignaturas (cod),
				FOREIGN KEY(grupo) REFERENCES grupos (cod)
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "ASIGNACIÓN ACADÉMICA" ##########
	if(strpos($url,"principal")){
		$instalacion=0;	
	}else{
		$instalacion=1;	
	}
	include('bdAsignacionAcademica/cargarExcel.php');
//################### CREAR UNA TABLA DE "ESTUDIANTES". ###################
	//Preparar consulta SQL
	$tabla='estudiantes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
			cod int NOT NULL AUTO_INCREMENT,			
			ID varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			genero int(1),
			sede int(1),
			grupo int(2),
			PRIMARY KEY(cod),
			FOREIGN KEY(sede) REFERENCES sedes (cod),
			FOREIGN KEY(grupo) REFERENCES grupos (cod)
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "ESTUDIANTES". ###################	
	if(strpos($url,"principal")){
		$instalacion=0;
	}else{
		$instalacion=1;
	}
	include('bdEstudiantes/leerExcel.php'); 
//########## CREAR UNA TABLA DE "CONDICIONES DE TALENTO" ##########
	// Preparamos la consulta SQL
	$tabla = 'condiciones';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				codArea int(2),
				tipoCondicion int(2),
				descripcion varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(cod),
				FOREIGN KEY(codArea) REFERENCES areas (cod)
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "CONDICIONES DE TALENTO" ##########
	if(strpos($url,"principal")){
		$instalacion=0;
	}else{
		$instalacion=1;
	}
	include('bdNominaciones/leerExcel01.php');

//########## CREAR UNA TABLA DE "RAZONES SUGERENCIAS" ##########
	// Preparamos la consulta SQL
	$tabla = 'razSug';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				razSug varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(cod)			
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "SUBRAZONES SUGERENCIAS" ##########
	if(strpos($url,"principal")){
		$instalacion=0;
	}else{
		$instalacion=1;
	}
	include('bdSugerencias/leerExcel01.php'); 
//########## CREAR UNA TABLA DE "SUBRAZONES SUGERENCIAS" ##########
	// Preparamos la consulta SQL
	$tabla = 'subrazones';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				idRazon int(1),
				subrazon varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(cod),
				FOREIGN KEY(idRazon) REFERENCES razSug (cod)		
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "SUBRAZONES SUGERENCIAS" ##########
	if(strpos($url,"principal")){
		$instalacion=0;
	}else{
		$instalacion=1;
	}
	include('bdSugerencias/leerExcel02.php'); 
//########## CREAR UNA TABLA DE "ESTUDIANTES NOMINADOS" ##########
	error_reporting(-1);
	// Preparamos la consulta SQL
	$tabla = 'estNominados';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				codEstudiante int(4),
				codArea int(4),
				docNominador int(2),
				codCondicion int(2),
				frecCondicion int(2),
				PRIMARY KEY(cod),
				FOREIGN KEY(codEstudiante) REFERENCES estudiantes (cod),
				FOREIGN KEY(codArea) REFERENCES areas (cod),
				FOREIGN KEY(docNominador) REFERENCES docentes (cod),
				FOREIGN KEY(codCondicion) REFERENCES condiciones (cod)
			)
		';
	//Ejecutar
	ejecutarConsulta();
//########## CREAR UNA TABLA DE "ESTUDIANTES SUGERIDOS" ##########
	// Preparamos la consulta SQL
	$tabla = 'estSugeridos';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				idEstudiante int(4),
				idArea int(4),
				docNominador int(2),
				idRazon int(4),
				idSubrazon int(4),
				evidencia varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
				PRIMARY KEY(cod),
				FOREIGN KEY(idEstudiante) REFERENCES estudiantes (cod),
				FOREIGN KEY(idArea) REFERENCES areas (cod),
				FOREIGN KEY(docNominador) REFERENCES docentes (cod),
				FOREIGN KEY(idRazon) REFERENCES razSug (cod),
				FOREIGN KEY(idSubrazon) REFERENCES subrazones (cod)
			)
		';
	//Ejecutar
	ejecutarConsulta();
                  
//########## CREAR UNA TABLA DE "PERMISOS" ##########
	// Preparamos la consulta SQL
	$tabla = 'permisos';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				cod int NOT NULL AUTO_INCREMENT,
				permisos varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(cod)	
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "PERMISOS" ##########
	$permisos = array(
		array("docente"),
		array("administrador"),
		array("superadministrador")		
		);
	
	foreach ($permisos as $permiso){
		$sql='INSERT INTO '.$tabla.' (permisos) 
			VALUES ("'.$permiso[0].'")';
			insertar();		
	}
		
//################### CONTENIDO DE PRUEBA PARA LA TABLA DE LOGS. ###################
	//Preparar
	$tabla='logs';
	$sql=
		'
			INSERT INTO '.$tabla.' (utc, anio, mes, dia, hora, minuto, segundo, ip, navegador, usuario, contrasena,pagVisitada)
			VALUES (0000000000,2011,02,07,21,03,00,"127.0.0.1","chrome","jocarsa","jocarsa","<a href=http://../principal.php>principal</a>")			
		';	
	//Insertar
	//insertar();
	
	//Cerrar
	mysqli_close($conexion);

	if(strpos($url,"principal")){
		echo "<div id='instalacion'> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='principal.php'>Volver</a> </div>";
	}else{
		echo "<div id='instalacion'> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='index.php'>Volver</a> </div>";
	}
	
	

?>

<script>alert("La instalación de la base de datos fue exitosa.");</script>

	</body>
</html>