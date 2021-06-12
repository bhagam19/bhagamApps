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

//################### CREAR UNA TABLA DE LIBROS ###################
	//Preparar consulta SQL
	$tabla='libros';
	$sql=
		"
			CREATE TABLE ".$tabla." (
			libroID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(libroID),
			imagen varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci,
			codigo varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			coleccion varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			titulo varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			apellidoAutor varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			nombreAutor varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			areaConocimiento varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			materia varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
			especialidad varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci,
			paisAutor varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci ,
			yearPublicacion int(4),
			volumen int(2),
			cantEjemplares int(3),
			calidad varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci,
			ejemplar int(3),
			numPaginas int(5),
			fechaRegistro date,
			usuario varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
		)";
	//Ejecutar	
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA LIBROS. ###################
	
	//Preparar consulta
	$tabla='libros';
	$sql=
		'
			INSERT INTO '.$tabla.' 
			(imagen,codigo, coleccion, titulo, apellidoAutor, nombreAutor, areaConocimiento,
			materia, especialidad, paisAutor, yearPublicacion, volumen, cantEjemplares,
			calidad, ejemplar, numPaginas, fechaRegistro, usuario)
			VALUES ("vueltamundo.jpg","- J -<br>400<br>S23.27<br>Vol.23-Ej.1","Juvenil","La vuelta al mundo en ochenta días",
			"Verne","Julio","8-Literatura","843-Novelística francesa"," ","Francia",
			1840, 23, 1, "Bueno", 2, 264, "2013-04-07","superadmin")
		';	
	//Insertar	
	insertar();

//################### CREAR UNA TABLA DE USUARIOS. ###################

	//Preparar
	$tabla='usuarios';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
			usuario varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			contrasena varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			nombre varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			apellido varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
			edad int,
			permisos int
		)';		
	//Ejecutar
	ejecutarConsulta();

//################### CONTENIDO DE PRUEBA PARA LA TABLA DE USUARIOS. ###################
	
	//Preparar
	$tabla='usuarios';
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario, contrasena, nombre, apellido, edad, permisos)
			VALUES ("superadmin","superadmin","Super","Administrador",40,1)
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario, contrasena, nombre, apellido, edad, permisos)
			VALUES ("admin","admin","Administrador","",35,2)
		';	
	//Insertar
	insertar();
	
	$sql=
		'
			INSERT INTO '.$tabla.' (usuario, contrasena, nombre, apellido, edad, permisos)
			VALUES ("reguser","reguser","Usuario","Registrado",30,3)
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
			VALUES (0000000000,2011,02,07,21,03,00,"127.0.0.1","chrome","jocarsa","jocarsa","<a href=http://../principal.php>principal</a>")			
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
	</body>
</html>