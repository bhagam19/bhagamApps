<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../css/instalacion.css">
	</head>

	<body>

<?php
	//Establecer conexion
	include('../../1-model/conex.php');

	echo "<div> <a href='index.php'>Volver</a> || <a href='mostrarTablasenBD.php'>Mostrar Base de Datos</a> <br><br></div>";
	echo "<div> <H1>===== RESUMEN DE INSTALACIÓN ===== </H1><br><br></div>";

//################### Creamos las funciones ejecutarConsulta() e insertar(). ###################		
function ejecutarConsulta(){
	global $sql;
	global $con;
	global $tabla;
	//if (mysqli_query($conexion,$sql)){
    if ($query=$con->query($sql)){
		echo "<div>========================= CREACIÓN DE LA TABLA '".strtoupper($tabla)."' =========================
            <br>====================================================================================<br></div>";
		echo "<div> Se creó la tabla <span>'".strtoupper($tabla)."'</span> con exito.<br><br></div>";		
	}else{
		echo "<div><p class='rojo'>========================= CREACIÓN DE LA TABLA '".strtoupper($tabla)."' =========================</p>
            <br>====================================================================================<br></div>";
		echo "<div><p class='rojo'>No se pudo crear la tabla <span>'".strtoupper($tabla)."'</span><span>. Razón: <span>[".mysqli_error($con)."]</span></p><br><br></div>";		
	}
}
	
function insertar(){
    set_time_limit(600);
	global $sql;
	global $con;
    global $tabla;		
	if ($query=$con->query($sql)){
		echo "<div>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></div>";
		echo "<div>Se insertaron los datos exitosamente.<br><br></div>";			
	}else{
		echo "<div>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></div>";
		echo "<div>No se insertaron los datos. <span>".mysqli_error($con)."</span><br><br></div>";		
	}
}	

//########## CREAR UNA TABLA DE "INSTALACION" ##########
	// Preparamos la consulta SQL
	$tabla = 'instalacion';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.' (
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

//########## CREAR UNA TABLA DE "CONTINENTES" ##########
	// Preparamos la consulta SQL
	$tabla = 'continentes';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int(2) NOT NULL,
				nomContinente varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)	
			)
		';
	//Ejecutar
	ejecutarConsulta();


	
//########## CREAR UNA TABLA DE "PAISES" ##########
	// Preparamos la consulta SQL
	$tabla = 'paises';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idContinente int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idContinente) REFERENCES continentes (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## CREAR UNA TABLA DE "DEPARTAMENTOS" ##########
	// Preparamos la consulta SQL
	$tabla = 'departamentos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idPais int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idPais) REFERENCES paises (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "MUNICIPIOS" ##########
	// Preparamos la consulta SQL
	$tabla = 'municipios';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idDepartamento int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idDepartamento) REFERENCES departamentos (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();


//########## CREAR UNA TABLA DE "INSTITUCIONES EDUCATIVAS" ##########
	// Preparamos la consulta SQL
	$tabla = 'instEducativas';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idMunicipio int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                dane int(10),
				PRIMARY KEY(id),				
				FOREIGN KEY(idMunicipio) REFERENCES municipios (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    //########## CREAR UNA TABLA DE "SEDES" ##########
	// Preparamos la consulta SQL
	$tabla = 'sedes';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idInstEducativas int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                dane int(10),
				PRIMARY KEY(id),				
				FOREIGN KEY(idInstEducativas) REFERENCES instEducativas (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    //########## CREAR UNA TABLA DE "JORNADAS" ##########
	// Preparamos la consulta SQL
	$tabla = 'jornadas';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "JORNADAS POR SEDES" ##########
	// Preparamos la consulta SQL
	$tabla = 'jornadasXsede';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idSedes int(2) NOT NULL,
                idJornadas int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idSedes) REFERENCES sedes (id),
                FOREIGN KEY(idJornadas) REFERENCES jornadas (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    //########## CREAR UNA TABLA DE "GRADOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'grados';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "GRADOS POR JORNADA" ##########
	// Preparamos la consulta SQL
	$tabla = 'gradosXjornada';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idGrados int(2) NOT NULL,
                idJornadasSede int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idGrados) REFERENCES grados (id),
                FOREIGN KEY(idJornadasSede) REFERENCES jornadasXsede (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    //########## CREAR UNA TABLA DE "GRUPOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'grupos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "GRUPOS POR GRADO" ##########
	// Preparamos la consulta SQL
	$tabla = 'gruposXgrado';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idGradosJornada int(2) NOT NULL,
                idGrupos int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idGrupos) REFERENCES grupos (id),
                FOREIGN KEY(idGradosJornada) REFERENCES gradosXjornada (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    
    //########## CREAR UNA TABLA DE "ÁREAS" ##########
	// Preparamos la consulta SQL
    $tabla = 'areas';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "ÁREAS POR GRUPO" ##########
	// Preparamos la consulta SQL
	$tabla = 'areasXgrupo';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idGruposGrado int(2) NOT NULL,
                idAreas int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idAreas) REFERENCES areas (id),
                FOREIGN KEY(idGruposGrado) REFERENCES gruposXgrado (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();        
    
    //########## CREAR UNA TABLA DE "PERIODOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'periodos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "PERIODOS POR ÁREA" ##########
	// Preparamos la consulta SQL
	$tabla = 'periodosXarea';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idAreasGrupo int(2) NOT NULL,
                idPeriodos int(2) NOT NULL,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),				
				FOREIGN KEY(idPeriodos) REFERENCES periodos (id),
                FOREIGN KEY(idAreasGrupo) REFERENCES areasXgrupo (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "TIPOS DE DOCUMENTO" ##########
	// Preparamos la consulta SQL
    $tabla = 'tiposDocumento';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				tipo varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "GRUPOS ÉTNICOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'gruposEtnicos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				name varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## CREAR UNA TABLA DE "ESTUDIANTES" ##########
	// Preparamos la consulta SQL
    $tabla = 'estudiantes';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
				nombre1 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                nombre2 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
                apellido1 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                apellido2 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
                email varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
                telefono int(10) NOT NULL,
                tipoDoc int(2) NOT NULL,
                documento int(10) NOT NULL,
                fechaNacimiento date NOT NULL,
                edad int(2) NOT NULL,
                lugarHermanos int(2) NOT NULL,
                viveCon varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                victima boolean NOT NULL,
                registroVictima boolean NOT NULL,
                grupoEtnico int(2) NOT NULL,
                centroProteccion int(2) NOT NULL,
                afiliacion int(2) NOT NULL,
				PRIMARY KEY(id),
                FOREIGN KEY(tipoDoc) REFERENCES tiposDocumento (id),
                FOREIGN KEY(grupoEtnico) REFERENCES gruposEtnicos (id),
                FOREIGN KEY(centroProteccion) REFERENCES centrosDEproteccion (id),
                FOREIGN KEY(afiliacion) REFERENCES afiliaciones (id)

			)
		';
	//Ejecutar
	ejecutarConsulta();
    
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
			defUsuario int NOT NULL,
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
			VALUES (-0000000005,2021,11,09,12,00,00,"127.0.0.1","chrome","Administrador","**********","<a href=http://../principal.php>principal</a>")			
		';	
	//Insertar
	insertar();
	
	//Cerrar
	mysqli_close($con);
	
	echo "<div> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='index.php'>Volver</a> </div>";

	

?>
	</body>
</html>