<html>
	<head>
		<link rel="stylesheet" type="text/css" href="02.1-instalacion.css">
	</head>
	<body>
<?php	
	include('01-datosConexion.php'); //Se establece la conexion.
	echo "<div> <a href='00-index.php'>Volver</a><br><br></div>";
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
		/*Niveles de usuarios				
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
	echo "<div> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='00-index.php'>Volver</a> </div>";
?>
	</body>
</html>