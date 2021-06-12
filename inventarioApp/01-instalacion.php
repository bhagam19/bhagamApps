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

//########## CREAR UNA TABLA DE "CLASES DE BIENES" ##########
	// Preparamos la consulta SQL
	$tabla = 'clasesDeBienes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				codClase int(2) NOT NULL,
				PRIMARY KEY(codClase),
				nomClase varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL 	
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "CLASES DE BIENES" ##########
	$clases = array(
		array(1,"Muebles"),
		array(2,"Equipos y Material de Laboratorio"),
		array(3,"Material Didáctico"),
		array(4,"Instrumentos Musicales"),
		array(5,"Equipos de Cómputo"),
		array(6,"Equipos de Comunicación"),
		array(7,"Equipos Audiovisuales"),
		array(8,"Equipos de Bombeo"),
		array(9,"Equipos de Oficina"),
		array(10,"Maquinaria de Talleres y Diversos Oficios"),
		array(11,"Maquinaria Agrícola"),
		array(12,"Bibliobancos de Textos Escolares"),
		array(13,"Material Bibliográfico"),
		array(14,"Licencias de Software"),
		array(15,"Semovientes"),
		array(16,"Muebles y Equipos de Enfermería y Primeros Auxilios"),
		array(17,"Extintores de Incendio"),
		array(18,"Bienes de Consumo (Papelería y Aseo)"),
		array(19,"Libros Reglamentarios"),
		array(20,"Enseres"),
		array(21,"Primeros Auxilios"),
		array(22,"Implementos de Aseo"),
		array(23,"Implementos de Recreación y Deportes"),
		array(24,"Utensilios de Cocina"),
		array(25,"Edificaciones"),
		);
	
	foreach ($clases as $clase){
		$sql='INSERT INTO '.$tabla.' (codClase, nomClase) 
			VALUES ('.$clase[0].',"'.$clase[1].'")';
			insertar();		
	}
	
//########## CREAR UNA TABLA DE "CATEGORÍAS DE BIENES" ##########
	// Preparamos la consulta SQL
	$tabla = 'categoriasDeBienes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				codCategoria int NOT NULL AUTO_INCREMENT,
				nomCategoria varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				codClase int,
				PRIMARY KEY(codCategoria),				
				FOREIGN KEY(codClase) REFERENCES clasesDeBienes (codClase)
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "CATEGORÍAS DE BIENES" ##########
	
	$categorias = array(
		array("Silla",1),
		array("Mesa",1),
		array("Escritorio",1),
		array("Portátil",5),
		array("Computador de Escritorio",5),
		array("Smart TV",6),
		array("Video Beam", 6)
		);
	
	foreach ($categorias as $categoria){
		$sql='INSERT INTO '.$tabla.' (nomCategoria, codClase) 
			VALUES ("'.$categoria[0].'",'.$categoria[1].')';
			insertar();		
	}	
	
//########## CREAR UNA TABLA DE "UBICACIONES" ##########
	// Preparamos la consulta SQL
	$tabla = 'ubicaciones';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
				codUbicacion int NOT NULL AUTO_INCREMENT,
				nomUbicacion varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(codUbicacion)
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## INGRESAR CONTENIDO A LA TABLA "UBICACIONES" ##########
	//Preparamos la consulta
	
	$ubicaciones = array("Salón","Oficina","Departamento","Otro Lugar");
	
	foreach ($ubicaciones as $ubicacion){
		$sql='INSERT INTO '.$tabla.' (nomUbicacion) 
			VALUES ("'.$ubicacion.'")';
			insertar();
	}	
		
//################### CREAR UNA TABLA DE "USUARIOS". ###################
	//Preparar consulta SQL
	$tabla='usuarios';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			usuarioID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(usuarioID),
			usuarioCED int(11) NOT NULL,
			usuario varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			contrasena varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
		    nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			defUsuario int NOT NULL ,
			permiso int(1) NOT NULL
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "USUARIOS". ###################
	$usuarios = array( 

		//(responsableCED, usuario, contrasena, nombres, apellidos, defUsuario, permiso)
		/*
			Niveles de usuarios
				
				0	Visitante 	//Usuario visitante (No tiene bienes a cargos, no administra)
				1	Usuario 	//User resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no conf.)
				2	Usuario 	//User no resp de bienes. Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (SSO)
				3	Usuario 	//User resp de bienes y Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (Docente apoyo inventario)
				4	Usuario 	//User resp de bienes y Admin avdc. [add, mod, del], todos los bienes.(Coord., Secret., Aux. de Confianza)
				5	Usuario 	//Usuario SuperAdministrador Frontend (Rector)	
				6	Usuario 	//Usuario SuperAdministrador Frontend y Backend (Desarrollador) 
		*/

		array(71379517,71379517,"inventApp","Adolfo León","Ruiz Hernández",1,6),
		array(12345,12345,"admin12345","Super","Admin IE",1,6)
		);
	
	foreach ($usuarios as $usuario){
		$sql='INSERT INTO '.$tabla.' (usuarioCED, usuario, contrasena, nombres, apellidos, defUsuario, permiso) 
			VALUES ('.$usuario[0].','.$usuario[1].',"'.$usuario[2].'","'.$usuario[3].'","'.$usuario[4].'",'.$usuario[5].','.$usuario[6].')';
			insertar();		
	}	

//################### CREAR UNA TABLA DE "DEPENDENCIAS". ###################
	//Preparar consulta SQL
	$tabla='dependencias';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			codDependencias int NOT NULL AUTO_INCREMENT,
			nomDependencias varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			codUbicacion int NOT NULL,
			usuarioID int NOT NULL,
			PRIMARY KEY(codDependencias),
			FOREIGN KEY(codUbicacion) REFERENCES ubicaciones(codUbicacion),
			FOREIGN KEY(usuarioID) REFERENCES usuarios(usuarioID)
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "DEPENDENCIAS". ###################
	$dependencias = array(//(nomDependencias, codUbicacion, usuarioID)
		array("AULA B2 C-102 (Secretaría)",2,40),		
		array("AULA B2 C-202 (Rectoría)",2,36)		
		);
	
	foreach ($dependencias as $dependencia){
		$sql='INSERT INTO '.$tabla.' (nomDependencias, codUbicacion, usuarioID) 
			VALUES ("'.$dependencia[0].'",'.$dependencia[1].','.$dependencia[2].')';
			insertar();		
	}	

//################### CREAR UNA TABLA DE "ESTADO ALMACENAMIENTO". ###################
	//Preparar consulta SQL
	$tabla='almacenamiento';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			codAlmacenamiento int NOT NULL AUTO_INCREMENT,
			nomAlmacenamiento varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY(codAlmacenamiento)
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "ESTADO ALMACENAMIENTO". ###################
	
	$almacenamientos = array("EN USO","ALMACENADO");
	
	foreach ($almacenamientos as $almacenamiento){
		$sql='INSERT INTO '.$tabla.' (nomAlmacenamiento) 
			VALUES ("'.$almacenamiento.'")';
			insertar();		
	}	

//################### CREAR UNA TABLA DE "ESTADO DEL BIEN". ###################
	//Preparar consulta SQL
	$tabla='estadoDelBien';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			codEstado int NOT NULL AUTO_INCREMENT,
			nomEstado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY(codEstado)
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "ESTADO DEL BIEN". ###################
	
	$estados = array("NUEVO","BUENO","REGULAR","MALO");
	
	foreach ($estados as $estado){
		$sql='INSERT INTO '.$tabla.' (nomEstado) 
			VALUES ("'.$estado.'")';
			insertar();		
	}	

//################### CREAR UNA TABLA DE "MANTENIMIENTO". ###################
	//Preparar consulta SQL
	$tabla='mantenimiento';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			codMantenimiento int NOT NULL AUTO_INCREMENT,
			nomMantenimiento varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			PRIMARY KEY(codMantenimiento)
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "MANTENIMIENTO". ###################
	
	$mantenimientos = array("AL DÍA","EN MORA","DADO DE BAJA");
	
	foreach ($mantenimientos as $mantenimiento){
		$sql='INSERT INTO '.$tabla.' (nomMantenimiento) 
			VALUES ("'.$mantenimiento.'")';
			insertar();		
	}	

//################### CREAR UNA TABLA DE "BIENES". ###################
	//Preparar consulta SQL
	$tabla='bienes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			codBien int NOT NULL AUTO_INCREMENT,			
			nomBien varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			detalleDelBien varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			serieDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			origenDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			fechaAdquisicion date ,
			precio float ,
			cantBien int (4) ,
			codCategoria int(2) ,
			codDependencias int(2) ,
			usuarioID int (2) ,
			codAlmacenamiento int (2) ,
			codEstado int(2) ,
			codMantenimiento int(2) ,
			observaciones varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci,	
			PRIMARY KEY(codBien),
			FOREIGN KEY (codCategoria) REFERENCES categoriasDeBienes (codCategoria),
			FOREIGN KEY (codDependencias) REFERENCES dependencias (codDependencias),
			FOREIGN KEY (usuarioID) REFERENCES usuarios (usuarioID),
			FOREIGN KEY (codAlmacenamiento) REFERENCES almacenamiento (codAlmacenamiento),
			FOREIGN KEY (codEstado) REFERENCES estadoDelBien (codEstado),
			FOREIGN KEY (codMantenimiento) REFERENCES mantenimiento (codMantenimiento)
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
/*//################### CONTENIDO DE PRUEBA PARA LA TABLA "BIENES". ###################
	$bienes = array(
		array("SILLA","UNIVERSITARIA,VERDE",1,"SEDUCA","2016-03-26",40000,30,1,4,4,1,1,2),
		array("SILLA","UNIVERSITARIA,MADERA",2,"MUNICIPIO","2017-10-04",30000,5,1,4,4,1,3,3)
		
		);
	
	foreach ($bienes as $bien){
		$sql='INSERT INTO '.$tabla.' (nomBien, detalleDelBien, serieDelBien, origenDelBien, fechaAdquisicion, precio, cantBien,codCategoria,codDependencias,usuarioID,codAlmacenamiento,codEstado,codMantenimiento) 
			VALUES ("'.$bien[0].'","'.$bien[1].'",'.$bien[2].',"'.$bien[3].'","'.$bien[4].'",'.$bien[5].','.$bien[6].','.$bien[7].','.$bien[8].','.$bien[9].','.$bien[10].','.$bien[11].','.$bien[12].')';
			insertar();		
	}	*/

	// $instalacion=1;
	// include('bdBienes/leerExcel.php'); 

//################### CREAR UNA TABLA DE "DETALLES DE BIENES". ###################
	//Preparar consulta SQL
	$tabla='detallesDeBienes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			codBien int (5) NOT NULL,			
			carEspecial varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			tamano varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			material varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			color varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			marca varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			otra varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,				
			PRIMARY KEY(codBien)
		)';
	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CREAR UNA TABLA DE "MODIFICACIONES A BIENES". ###################
	//Preparar consulta SQL
	$tabla='modificacionesBienes';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			codBien int (4),			
			nomBien varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			detalleDelBien varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			serieDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			origenDelBien varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			fechaAdquisicion date ,
			precio float ,
			cantBien int (4) ,
			codCategoria int(2) ,
			codDependencias int(2) ,
			usuarioID int (2) ,
			codAlmacenamiento int (2) ,
			codEstado int(2) ,
			codMantenimiento int(2),
			observaciones varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci
		)';
	
	//Ejecutar	
	ejecutarConsulta();

//################### CREAR UNA TABLA DE LOGS. ###################
	
	//Preparar
	$tabla='logs';
	$sql=
		'
			CREATE TABLE '.$tabla.'(
			utc int,
			anio varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			mes varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			dia varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			hora varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			minuto varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			segundo varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			ip varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			navegador varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			usuario varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			contrasena varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
			pagVisitada varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci

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
	
	echo "<div> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='index.php'>Volver</a> </div>";

	

?>
	</body>
</html>