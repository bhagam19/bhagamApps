<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bd.css">
	</head>
	<body>
<?php
	//Establecer conexion
	include('cnx.php');
	echo "<div> <a href='../../index.php'>Volver</a><br><br></div>";
	echo "<div> <H1>===== RESUMEN DE INSTALACIÓN ===== </H1><br><br></div>";
//################### Creamos las funciones ejecutarConsulta() e insertar(). ###################		
function ejecutarConsulta(){
	global $sql;
	global $cnx;
	global $tabla;
	//if (mysqli_query($conexion,$sql)){
    if ($query=$cnx->query($sql)){
		echo "<div>========================= CREACIÓN DE LA TABLA '".strtoupper($tabla)."' =========================
            <br>====================================================================================<br></div>";
		echo "<div> Se creo la tabla <span>'".strtoupper($tabla)."'</span> con exito.<br><br></div>";		
	}else{
		echo "<div>========================= CREACIÓN DE LA TABLA '".strtoupper($tabla)."' =========================
            <br>====================================================================================<br></div>";
		echo "<div>No se pudo crear la tabla <span>'".strtoupper($tabla)."'</span>. Razón: <span>[".mysqli_error($cnx)."]</span><br><br></div>";		
	}
}	
function insertar(){
	global $sql;
	global $cnx;
    global $tabla;		
	if ($query=$cnx->query($sql)){
		echo "<div>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></div>";
		echo "<div>Se insertaron los datos exitosamente.<br><br></div>";			
	}else{
		echo "<div>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></div>";
		echo "<div>No se insertaron los datos. <span>".mysqli_error($cnx)."</span><br><br></div>";		
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
//########## INGRESAR CONTENIDO A LA TABLA "CONTINENTES" ##########
	$continentes = array(
		array(1,"África"),
		array(2,"América"),
		array(3,"Asia"),
		array(4,"Europa"),
		array(5,"Oceanía"),
		);	
	foreach ($continentes as $continente){
		$sql='INSERT INTO '.$tabla.' (id, nomContinente) 
			VALUES ('.$continente[0].',"'.$continente[1].'")';
			insertar();		
	}	
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
//########## INGRESAR CONTENIDO A LA TABLA "PAISES" ##########	
	$paises = array(
        array(4,"Austria"),
        array(4, "Belgica"),
        array(4, "Bulgaria"),
        array(4, "Chipre"),
        array(4, "Dinamarca"),
        array(4, "España"),
        array(4, "Finlandia"),
        array(4, "Francia"),
        array(4, "Grecia"),
        array(4, "Hungria"),
        array(4, "Irlanda"),
        array(4, "Italia"),
        array(4, "Luxemburgo"),
        array(4, "Malta"),
        array(4, "Paises Bajos"),
        array(4, "Polonia"),
        array(4, "Portugal"),
        array(4, "Reino Unido"),
        array(4, "Alemania"),
        array(4, "Rumania"),
        array(4, "Suecia"),
        array(4, "Letonia"),
        array(4, "Estonia"),
        array(4, "Lituania"),
        array(4, "Republica Checa"),
        array(4, "Republica Eslovaca"),
        array(4, "Eslovenia"),
        array(4, "Albania"),
        array(4, "Islandia"),
        array(4, "Liechtenstein"),
        array(4, "Monaco"),
        array(4, "Noruega"),
        array(4, "Andorra"),
        array(4, "San Marino"),
        array(4, "Santa Sede"),
        array(4, "Suiza"),
        array(4, "Ucrania"),
        array(4, "Moldavia"),
        array(4, "Belarus"),
        array(4, "Georgia"),
        array(4, "Bosnia Y Herzegovina"),
        array(4, "Croacia"),
        array(4, "Armenia"),
        array(4, "Rusia"),
        array(4, "Macedonia "),
        array(4, "Serbia"),
        array(4, "Montenegro"),
        array(4, "Guernesey"),
        array(4, "Svalbard Y Jan Mayen"),
        array(4, "Islas Feroe"),
        array(4, "Isla De Man"),
        array(4, "Gibraltar"),
        array(4, "Islas Del Canal"),
        array(4, "Jersey"),
        array(4, "Islas Aland"),
        array(4, "Turquia"),
        array(4, "Otros Paises O Territorios Del Resto De Europa"),
        array(1, "Burkina Faso"),
        array(1, "Angola"),
        array(1, "Argelia"),
        array(1, "Benin"),
        array(1, "Botswana"),
        array(1, "Burundi"),
        array(1, "Cabo Verde"),
        array(1, "Camerun"),
        array(1, "Comores"),
        array(1, "Congo"),
        array(1, "Costa De Marfil"),
        array(1, "Djibouti"),
        array(1, "Egipto"),
        array(1, "Etiopia"),
        array(1, "Gabon"),
        array(1, "Gambia"),
        array(1, "Ghana"),
        array(1, "Guinea"),
        array(1, "Guinea-Bissau"),
        array(1, "Guinea Ecuatorial"),
        array(1, "Kenia"),
        array(1, "Lesotho"),
        array(1, "Liberia"),
        array(1, "Libia"),
        array(1, "Madagascar"),
        array(1, "Malawi"),
        array(1, "Mali"),
        array(1, "Marruecos"),
        array(1, "Mauricio"),
        array(1, "Mauritania"),
        array(1, "Mozambique"),
        array(1, "Namibia"),
        array(1, "Niger"),
        array(1, "Nigeria"),
        array(1, "Republica Centroafricana"),
        array(1, "Sudafrica"),
        array(1, "Ruanda"),
        array(1, "Santo Tome Y Principe"),
        array(1, "Senegal"),
        array(1, "Seychelles"),
        array(1, "Sierra Leona"),
        array(1, "Somalia"),
        array(1, "Sudan"),
        array(1, "Swazilandia"),
        array(1, "Tanzania"),
        array(1, "Chad"),
        array(1, "Togo"),
        array(1, "Tunez"),
        array(1, "Uganda"),
        array(1, "Rep.Democratica Del Congo"),
        array(1, "Zambia"),
        array(1, "Zimbabwe"),
        array(1, "Eritrea"),
        array(1, "Santa Helena"),
        array(1, "Reunion"),
        array(1, "Mayotte"),
        array(1, "Sahara Occidental"),
        array(2, "Otros Paises O Territorios De Africa"),
        array(2, "Canada"),
        array(2, "Estados Unidos De America"),
        array(2, "Mexico"),
        array(2, "San Pedro Y Miquelon "),
        array(2, "Groenlandia"),
        array(2, "Antigua Y Barbuda"),
        array(2, "Bahamas"),
        array(2, "Barbados"),
        array(2, "Belice"),
        array(2, "Costa Rica"),
        array(2, "Cuba"),
        array(2, "Dominica"),
        array(2, "El Salvador"),
        array(2, "Granada"),
        array(2, "Guatemala"),
        array(2, "Haiti"),
        array(2, "Honduras"),
        array(2, "Jamaica"),
        array(2, "Nicaragua"),
        array(2, "Panama"),
        array(2, "San Vicente Y Las Granadinas"),
        array(2, "Republica Dominicana"),
        array(2, "Trinidad Y Tobago"),
        array(2, "Santa Lucia"),
        array(2, "San Cristobal Y Nieves"),
        array(2, "Islas Caimán"),
        array(2, "Islas Turcas Y Caicos"),
        array(2, "Islas Vírgenes De Los Estados Unidos"),
        array(2, "Guadalupe"),
        array(2, "Antillas Holandesas"),
        array(2, "San Martin (Parte Francesa)"),
        array(2, "Aruba"),
        array(2, "Montserrat"),
        array(2, "Anguilla"),
        array(2, "San Bartolome"),
        array(2, "Martinica"),
        array(2, "Puerto Rico"),
        array(2, "Bermudas"),
        array(2, "Islas Virgenes Britanicas"),
        array(2, "Argentina"),
        array(2, "Bolivia"),
        array(2, "Brasil"),
        array(2, "Colombia"),
        array(2, "Chile"),
        array(2, "Ecuador"),
        array(2, "Guyana"),
        array(2, "Paraguay"),
        array(2, "Peru"),
        array(2, "Surinam"),
        array(2, "Uruguay"),
        array(2, "Venezuela"),
        array(2, "Guayana Francesa"),
        array(2, "Islas Malvinas"),
        array(2, "Otros Paises O Territorios  De America"),
        array(3, "Afganistan"),
        array(3, "Arabia Saudi"),
        array(3, "Bahrein"),
        array(3, "Bangladesh"),
        array(3, "Myanmar"),
        array(3, "China"),
        array(3, "Emiratos Arabes Unidos"),
        array(3, "Filipinas"),
        array(3, "India"),
        array(3, "Indonesia"),
        array(3, "Iraq"),
        array(3, "Iran"),
        array(3, "Israel"),
        array(3, "Japon"),
        array(3, "Jordania"),
        array(3, "Camboya"),
        array(3, "Kuwait"),
        array(3, "Laos"),
        array(3, "Libano"),
        array(3, "Malasia"),
        array(3, "Maldivas"),
        array(3, "Mongolia"),
        array(3, "Nepal"),
        array(3, "Oman"),
        array(3, "Pakistan"),
        array(3, "Qatar"),
        array(3, "Corea"),
        array(3, "Corea Del Norte "),
        array(3, "Singapur"),
        array(3, "Siria"),
        array(3, "Sri Lanka"),
        array(3, "Tailandia"),
        array(3, "Vietnam"),
        array(3, "Brunei"),
        array(3, "Islas Marshall"),
        array(3, "Yemen"),
        array(3, "Azerbaiyan"),
        array(3, "Kazajstan"),
        array(3, "Kirguistan"),
        array(3, "Tadyikistan"),
        array(3, "Turkmenistan"),
        array(3, "Uzbekistan"),
        array(3, "Islas Marianas Del Norte"),
        array(3, "Palestina"),
        array(3, "Hong Kong"),
        array(3, "Bhután"),
        array(3, "Guam"),
        array(3, "Macao"),
        array(3, "Otros Paises O Territorios De Asia"),
        array(5, "Australia"),
        array(5, "Fiji"),
        array(5, "Nueva Zelanda"),
        array(5, "Papua Nueva Guinea"),
        array(5, "Islas Salomon"),
        array(5, "Samoa"),
        array(5, "Tonga"),
        array(5, "Vanuatu"),
        array(5, "Micronesia"),
        array(5, "Tuvalu"),
        array(5, "Islas Cook"),
        array(5, "Nauru"),
        array(5, "Palaos"),
        array(5, "Timor Oriental"),
        array(5, "Polinesia Francesa"),
        array(5, "Isla Norfolk"),
        array(5, "Kiribati"),
        array(5, "Niue"),
        array(5, "Islas Pitcairn"),
        array(5, "Tokelau"),
        array(5, "Nueva Caledonia"),
        array(5, "Wallis Y Fortuna"),
        array(5, "Samoa Americana"),
        array(5, "Otros Paises O Territorios De Oceania"),	
		);	
	foreach ($paises as $pais){
		$sql='INSERT INTO '.$tabla.' (idContinente, nombre) 
			VALUES ('.$pais[0].',"'.$pais[1].'")';
            //echo $sql;
			insertar();		
	}	
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
//########## INGRESAR CONTENIDO A LA TABLA "DEPARTAMENTOS" ##########	
	$departamentos = array(
        array(158, "Amazonas"),
        array(158, "Antioquia"),
        array(158, "Arauca"),
        array(158, "Atlantico"),
        array(158, "Bolivar"),
        array(158, "Boyaca"),
        array(158, "Caldas"),
        array(158, "Caqueta"),
        array(158, "Casanare"),
        array(158, "Cauca"),
        array(158, "Cesar"),
        array(158, "Choco"),
        array(158, "Cordoba"),
        array(158, "Cundinamarca"),
        array(158, "Guainia"),
        array(158, "Guaviare"),
        array(158, "Huila"),
        array(158, "La Guajira"),
        array(158, "Magdalena"),
        array(158, "Meta"),
        array(158, "Narino"),
        array(158, "Norte De Santander"),
        array(158, "Putumayo"),
        array(158, "Quindio"),
        array(158, "Risaralda"),
        array(158, "San Andres Y Providencia"),
        array(158, "Santander"),
        array(158, "Sucre"),
        array(158, "Tolima"),
        array(158, "Valle Del Cauca"),
        array(158, "Vaupes"),
        array(158, "Vichada"),
        array(158, "Casanare"),
        array(158, "Cundinamarca"),
        array(158, "Guainia"),
        array(158, "Guaviare"),
        array(158, "Huila"),
        array(158, "La Guajira"),
        array(158, "Magdalena"),
        array(158, "Meta"),
        array(158, "Narino"),
    );
    foreach ($departamentos as $departamento){
        $sql='INSERT INTO '.$tabla.' (idPais, nombre) 
            VALUES ('.$departamento[0].',"'.$departamento[1].'")';
            //echo $sql;
            insertar();		
    }
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

//########## INGRESAR CONTENIDO A LA TABLA "MUNICIPIOS" ##########	
	$municipios = array(
        array(1, "Medellin"),
        array(1, "Arauca"),        
    );
    foreach ($departamentos as $departamento){
        $sql='INSERT INTO '.$tabla.' (idPais, nombre) 
            VALUES ('.$departamento[0].',"'.$departamento[1].'")';
            //echo $sql;
            insertar();		
    }
//########## CREAR UNA TABLA DE "USUARIOS". ###################
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
//########## CONTENIDO DE PRUEBA PARA LA TABLA "USUARIOS". ###################
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
//########## CREAR UNA TABLA DE LOGS. ###################	
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
//########## CONTENIDO DE PRUEBA PARA LA TABLA DE LOGS. ###################	
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
	mysqli_close($cnx);	
	echo "<div> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='../../index.php'>Volver</a> </div>";
?>
	</body>
</html>