<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bd.css">
	</head>

	<body>

<?php
//Establecer conexion
	include('./cnx.php');

	echo "<div> <a href='index.php'>Volver</a> || <a href='mostrarTablasenBD.php'>Mostrar Base de Datos</a> <br><br></div>";
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
            echo "<div> Se creó la tabla <span>'".strtoupper($tabla)."'</span> con exito.<br><br></div>";		
        }else{
            echo "<div><p class='rojo'>========================= CREACIÓN DE LA TABLA '".strtoupper($tabla)."' =========================</p>
                <br>====================================================================================<br></div>";
            echo "<div><p class='rojo'>No se pudo crear la tabla'".strtoupper($tabla)."'. Razón: [".mysqli_error($cnx)."]</p><br><br></div>";		
        }
    }
	
    function insertar(){
        set_time_limit(600);
        global $sql;
        global $cnx;
        global $tabla;		
        if ($query=$cnx->query($sql)){
            echo "<div>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></div>";
            echo "<div>Se insertaron los datos exitosamente.<br><br></div>";			
        }else{
            echo "<div><p class='rojo'>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></p></div>";
            echo "<div><p class='rojo'>No se insertaron los datos. ".mysqli_error($cnx)."</p><br><br></div>";		
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


//########## CREAR UNA TABLA DE "OPCIONES" ##########
	// Preparamos la consulta SQL
	$tabla = 'opciones';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.' (
				id int(2) NOT NULL,
				opcion varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## INGRESAR CONTENIDO A LA TABLA "OPCIONES" ##########
    $opciones = array(
        array(1,"Si"),
        array(2,"No"),
    );

    foreach ($opciones as $opcion) {
        $sql='INSERT INTO '.$tabla.' (id, opcion) 
            VALUES ('.$opcion[0].',"'.$opcion[1].'")';
        insertar();		
    }

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
    );
    foreach ($departamentos as $departamento){
        $sql='INSERT INTO '.$tabla.' (idPais, nombre) 
            VALUES ('.$departamento[0].',"'.$departamento[1].'")';
            //echo $sql;
            insertar();		
    }
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

    //########## INGRESAR CONTENIDO A LA TABLA "MUNICIPIOS" ##########
	
	$municipios = array(
        array(1,'El Encanto'),
        array(1,'La Chorrera'),
        array(1,'La Pedrera'),
        array(1,'La Victoria'),
        array(1,'Leticia'),
        array(1,'Miriti - Paraná'),
        array(1,'Puerto Alegria'),
        array(1,'Puerto Arica'),
        array(1,'Puerto Nariño'),
        array(1,'Puerto Santander'),
        array(1,'Tarapacá'),
        array(2,'Cáceres'),
        array(2,'Caucasia'),
        array(2,'El Bagre'),
        array(2,'Nechí'),
        array(2,'Tarazá'),
        array(2,'Zaragoza'),
        array(2,'Caracolí'),
        array(2,'Maceo'),
        array(2,'Puerto Berrio'),
        array(2,'Puerto Nare'),
        array(2,'Puerto Triunfo'),
        array(2,'Yondó'),
        array(2,'Amalfi'),
        array(2,'Anorí'),
        array(2,'Cisneros'),
        array(2,'Remedios'),
        array(2,'San Roque'),
        array(2,'Santo Domingo'),
        array(2,'Segovia'),
        array(2,'Vegachí'),
        array(2,'Yalí'),
        array(2,'Yolombó'),
        array(2,'Angostura'),
        array(2,'Belmira'),
        array(2,'Briceño'),
        array(2,'Campamento'),
        array(2,'Carolina'),
        array(2,'Don Matias'),
        array(2,'Entrerrios'),
        array(2,'Gómez Plata'),
        array(2,'Guadalupe'),
        array(2,'Ituango'),
        array(2,'San Andrés'),
        array(2,'San José De La Montaña'),
        array(2,'San Pedro'),
        array(2,'Santa Rosa De Osos'),
        array(2,'Toledo'),
        array(2,'Valdivia'),
        array(2,'Yarumal'),
        array(2,'Abriaquí'),
        array(2,'Anza'),
        array(2,'Armenia'),
        array(2,'Buriticá'),
        array(2,'Cañasgordas'),
        array(2,'Dabeiba'),
        array(2,'Ebéjico'),
        array(2,'Frontino'),
        array(2,'Giraldo'),
        array(2,'Heliconia'),
        array(2,'Liborina'),
        array(2,'Olaya'),
        array(2,'Peque'),
        array(2,'Sabanalarga'),
        array(2,'San Jerónimo'),
        array(2,'Santafé De Antioquia'),
        array(2,'Sopetran'),
        array(2,'Uramita'),
        array(2,'Abejorral'),
        array(2,'Alejandría'),
        array(2,'Argelia'),
        array(2,'Carmen De Viboral'),
        array(2,'Cocorná'),
        array(2,'Concepción'),
        array(2,'Granada'),
        array(2,'Guarne'),
        array(2,'Guatape'),
        array(2,'La Ceja'),
        array(2,'La Unión'),
        array(2,'Marinilla'),
        array(2,'Nariño'),
        array(2,'Peñol'),
        array(2,'Retiro'),
        array(2,'Rionegro'),
        array(2,'San Carlos'),
        array(2,'San Francisco'),
        array(2,'San Luis'),
        array(2,'San Rafael'),
        array(2,'San Vicente'),
        array(2,'Santuario'),
        array(2,'Sonson'),
        array(2,'Amaga'),
        array(2,'Andes'),
        array(2,'Angelopolis'),
        array(2,'Betania'),
        array(2,'Betulia'),
        array(2,'Caicedo'),
        array(2,'Caramanta'),
        array(2,'Ciudad Bolívar'),
        array(2,'Concordia'),
        array(2,'Fredonia'),
        array(2,'Hispania'),
        array(2,'Jardín'),
        array(2,'Jericó'),
        array(2,'La Pintada'),
        array(2,'Montebello'),
        array(2,'Pueblorrico'),
        array(2,'Salgar'),
        array(2,'Santa Barbara'),
        array(2,'Támesis'),
        array(2,'Tarso'),
        array(2,'Titiribí'),
        array(2,'Urrao'),
        array(2,'Valparaiso'),
        array(2,'Venecia'),
        array(2,'Apartadó'),
        array(2,'Arboletes'),
        array(2,'Carepa'),
        array(2,'Chigorodó'),
        array(2,'Murindó'),
        array(2,'Mutata'),
        array(2,'Necoclí'),
        array(2,'San Juan De Uraba'),
        array(2,'San Pedro De Uraba'),
        array(2,'Turbo'),
        array(2,'Vigía Del Fuerte'),
        array(2,'Barbosa'),
        array(2,'Bello'),
        array(2,'Caldas'),
        array(2,'Copacabana'),
        array(2,'Envigado'),
        array(2,'Girardota'),
        array(2,'Itagui'),
        array(2,'La Estrella'),
        array(2,'Medellín'),
        array(2,'Sabaneta'),
        array(3,'Arauca'),
        array(3,'Arauquita'),
        array(3,'Cravo Norte'),
        array(3,'Fortul'),
        array(3,'Puerto Rondón'),
        array(3,'Saravena'),
        array(3,'Tame'),
        array(26,'Providencia Y Santa Catalina'),
        array(26,'San Andres'),
        array(4,'Barranquilla'),
        array(4,'Galapa'),
        array(4,'Malambo'),
        array(4,'Puerto Colombia'),
        array(4,'Soledad'),
        array(4,'Campo De La Cruz'),
        array(4,'Candelaria'),
        array(4,'Luruaco'),
        array(4,'Manati'),
        array(4,'Repelon'),
        array(4,'Santa Lucia'),
        array(4,'Suan'),
        array(4,'Baranoa'),
        array(4,'Palmar De Varela'),
        array(4,'Polonuevo'),
        array(4,'Ponedera'),
        array(4,'Sabanagrande'),
        array(4,'Sabanalarga'),
        array(4,'Santo Tomas'),
        array(4,'Juan De Acosta'),
        array(4,'Piojó'),
        array(4,'Tubara'),
        array(4,'Usiacuri'),
        array(14,'Bogota D.C.'),
        array(5,'Cicuco'),
        array(5,'Hatillo De Loba'),
        array(5,'Margarita'),
        array(5,'Mompós'),
        array(5,'San Fernando'),
        array(5,'Talaigua Nuevo'),
        array(5,'Arjona'),
        array(5,'Arroyohondo'),
        array(5,'Calamar'),
        array(5,'Cartagena'),
        array(5,'Clemencia'),
        array(5,'Mahates'),
        array(5,'San Cristobal'),
        array(5,'San Estanislao'),
        array(5,'Santa Catalina'),
        array(5,'Santa Rosa De Lima'),
        array(5,'Soplaviento'),
        array(5,'Turbaco'),
        array(5,'Turbana'),
        array(5,'Villanueva'),
        array(5,'Altos Del Rosario'),
        array(5,'Barranco De Loba'),
        array(5,'El Peñon'),
        array(5,'Regidor'),
        array(5,'Río Viejo'),
        array(5,'San Martin De Loba'),
        array(5,'Arenal'),
        array(5,'Cantagallo'),
        array(5,'Morales'),
        array(5,'San Pablo'),
        array(5,'Santa Rosa Del Sur'),
        array(5,'Simití'),
        array(5,'Achí'),
        array(5,'Magangué'),
        array(5,'Montecristo'),
        array(5,'Pinillos'),
        array(5,'San Jacinto Del Cauca'),
        array(5,'Tiquisio'),
        array(5,'Carmen De Bolívar'),
        array(5,'Córdoba'),
        array(5,'El Guamo'),
        array(5,'María La Baja'),
        array(5,'San Jacinto'),
        array(5,'San Juan Nepomuceno'),
        array(5,'Zambrano'),
        array(6,'Chíquiza'),
        array(6,'Chivatá'),
        array(6,'Cómbita'),
        array(6,'Cucaita'),
        array(6,'Motavita'),
        array(6,'Oicatá'),
        array(6,'Samacá'),
        array(6,'Siachoque'),
        array(6,'Sora'),
        array(6,'Soracá'),
        array(6,'Sotaquirá'),
        array(6,'Toca'),
        array(6,'Tunja'),
        array(6,'Tuta'),
        array(6,'Ventaquemada'),
        array(6,'Chiscas'),
        array(6,'Cubará'),
        array(6,'El Cocuy'),
        array(6,'El Espino'),
        array(6,'Guacamayas'),
        array(6,'Güicán'),
        array(6,'Panqueba'),
        array(6,'Labranzagrande'),
        array(6,'Pajarito'),
        array(6,'Paya'),
        array(6,'Pisba'),
        array(6,'Berbeo'),
        array(6,'Campohermoso'),
        array(6,'Miraflores'),
        array(6,'Páez'),
        array(6,'San Eduardo'),
        array(6,'Zetaquira'),
        array(6,'Boyacá'),
        array(6,'Ciénega'),
        array(6,'Jenesano'),
        array(6,'Nuevo Colón'),
        array(6,'Ramiriquí'),
        array(6,'Rondón'),
        array(6,'Tibaná'),
        array(6,'Turmequé'),
        array(6,'Umbita'),
        array(6,'Viracachá'),
        array(6,'Chinavita'),
        array(6,'Garagoa'),
        array(6,'Macanal'),
        array(6,'Pachavita'),
        array(6,'San Luis De Gaceno'),
        array(6,'Santa María'),
        array(6,'Boavita'),
        array(6,'Covarachía'),
        array(6,'La Uvita'),
        array(6,'San Mateo'),
        array(6,'Sativanorte'),
        array(6,'Sativasur'),
        array(6,'Soatá'),
        array(6,'Susacón'),
        array(6,'Tipacoque'),
        array(6,'Briceño'),
        array(6,'Buenavista'),
        array(6,'Caldas'),
        array(6,'Chiquinquirá'),
        array(6,'Coper'),
        array(6,'La Victoria'),
        array(6,'Maripí'),
        array(6,'Muzo'),
        array(6,'Otanche'),
        array(6,'Pauna'),
        array(6,'Puerto Boyaca'),
        array(6,'Quípama'),
        array(6,'Saboyá'),
        array(6,'San Miguel De Sema'),
        array(6,'San Pablo Borbur'),
        array(6,'Tununguá'),
        array(6,'Almeida'),
        array(6,'Chivor'),
        array(6,'Guateque'),
        array(6,'Guayatá'),
        array(6,'La Capilla'),
        array(6,'Somondoco'),
        array(6,'Sutatenza'),
        array(6,'Tenza'),
        array(6,'Arcabuco'),
        array(6,'Chitaraque'),
        array(6,'Gachantivá'),
        array(6,'Moniquirá'),
        array(6,'Ráquira'),
        array(6,'Sáchica'),
        array(6,'San José De Pare'),
        array(6,'Santa Sofía'),
        array(6,'Santana'),
        array(6,'Sutamarchán'),
        array(6,'Tinjacá'),
        array(6,'Togüí'),
        array(6,'Villa De Leyva'),
        array(6,'Aquitania'),
        array(6,'Cuítiva'),
        array(6,'Firavitoba'),
        array(6,'Gameza'),
        array(6,'Iza'),
        array(6,'Mongua'),
        array(6,'Monguí'),
        array(6,'Nobsa'),
        array(6,'Pesca'),
        array(6,'Sogamoso'),
        array(6,'Tibasosa'),
        array(6,'Tópaga'),
        array(6,'Tota'),
        array(6,'Belén'),
        array(6,'Busbanzá'),
        array(6,'Cerinza'),
        array(6,'Corrales'),
        array(6,'Duitama'),
        array(6,'Floresta'),
        array(6,'Paipa'),
        array(6,'San Rosa Viterbo'),
        array(6,'Tutazá'),
        array(6,'Betéitiva'),
        array(6,'Chita'),
        array(6,'Jericó'),
        array(6,'Paz De Río'),
        array(6,'Socha'),
        array(6,'Socotá'),
        array(6,'Tasco'),
        array(7,'Filadelfia'),
        array(7,'La Merced'),
        array(7,'Marmato'),
        array(7,'Riosucio'),
        array(7,'Supía'),
        array(7,'Manzanares'),
        array(7,'Marquetalia'),
        array(7,'Marulanda'),
        array(7,'Pensilvania'),
        array(7,'Anserma'),
        array(7,'Belalcázar'),
        array(7,'Risaralda'),
        array(7,'San José'),
        array(7,'Viterbo'),
        array(7,'Chinchina'),
        array(7,'Manizales'),
        array(7,'Neira'),
        array(7,'Palestina'),
        array(7,'Villamaria'),
        array(7,'Aguadas'),
        array(7,'Aranzazu'),
        array(7,'Pácora'),
        array(7,'Salamina'),
        array(7,'La Dorada'),
        array(7,'Norcasia'),
        array(7,'Samaná'),
        array(7,'Victoria'),
        array(8,'Albania'),
        array(8,'Belén De Los Andaquies'),
        array(8,'Cartagena Del Chairá'),
        array(8,'Currillo'),
        array(8,'El Doncello'),
        array(8,'El Paujil'),
        array(8,'Florencia'),
        array(8,'La Montañita'),
        array(8,'Milan'),
        array(8,'Morelia'),
        array(8,'Puerto Rico'),
        array(8,'San Jose Del Fragua'),
        array(8,'San Vicente Del Caguán'),
        array(8,'Solano'),
        array(8,'Solita'),
        array(8,'Valparaiso'),
        array(9,'Aguazul'),
        array(9,'Chameza'),
        array(9,'Hato Corozal'),
        array(9,'La Salina'),
        array(9,'Maní'),
        array(9,'Monterrey'),
        array(9,'Nunchía'),
        array(9,'Orocué'),
        array(9,'Paz De Ariporo'),
        array(9,'Pore'),
        array(9,'Recetor'),
        array(9,'Sabanalarga'),
        array(9,'Sácama'),
        array(9,'San Luis De Palenque'),
        array(9,'Támara'),
        array(9,'Tauramena'),
        array(9,'Trinidad'),
        array(9,'Villanueva'),
        array(9,'Yopal'),
        array(10,'Cajibío'),
        array(10,'El Tambo'),
        array(10,'La Sierra'),
        array(10,'Morales'),
        array(10,'Piendamo'),
        array(10,'Popayán'),
        array(10,'Rosas'),
        array(10,'Sotara'),
        array(10,'Timbio'),
        array(10,'Buenos Aires'),
        array(10,'Caloto'),
        array(10,'Corinto'),
        array(10,'Miranda'),
        array(10,'Padilla'),
        array(10,'Puerto Tejada'),
        array(10,'Santander De Quilichao'),
        array(10,'Suarez'),
        array(10,'Villa Rica'),
        array(10,'Guapi'),
        array(10,'Lopez'),
        array(10,'Timbiqui'),
        array(10,'Caldono'),
        array(10,'Inzá'),
        array(10,'Jambalo'),
        array(10,'Paez'),
        array(10,'Purace'),
        array(10,'Silvia'),
        array(10,'Toribio'),
        array(10,'Totoro'),
        array(10,'Almaguer'),
        array(10,'Argelia'),
        array(10,'Balboa'),
        array(10,'Bolívar'),
        array(10,'Florencia'),
        array(10,'La Vega'),
        array(10,'Mercaderes'),
        array(10,'Patia'),
        array(10,'Piamonte'),
        array(10,'San Sebastian'),
        array(10,'Santa Rosa'),
        array(10,'Sucre'),
        array(11,'Becerril'),
        array(11,'Chimichagua'),
        array(11,'Chiriguana'),
        array(11,'Curumaní'),
        array(11,'La Jagua De Ibirico'),
        array(11,'Pailitas'),
        array(11,'Tamalameque'),
        array(11,'Astrea'),
        array(11,'Bosconia'),
        array(11,'El Copey'),
        array(11,'El Paso'),
        array(11,'Agustín Codazzi'),
        array(11,'La Paz'),
        array(11,'Manaure'),
        array(11,'Pueblo Bello'),
        array(11,'San Diego'),
        array(11,'Valledupar'),
        array(11,'Aguachica'),
        array(11,'Gamarra'),
        array(11,'González'),
        array(11,'La Gloria'),
        array(11,'Pelaya'),
        array(11,'Río De Oro'),
        array(11,'San Alberto'),
        array(11,'San Martín'),
        array(12,'Atrato'),
        array(12,'Bagadó'),
        array(12,'Bojaya'),
        array(12,'El Carmen De Atrato'),
        array(12,'Lloró'),
        array(12,'Medio Atrato'),
        array(12,'Quibdó'),
        array(12,'Rio Quito'),
        array(12,'Acandí'),
        array(12,'Belén De Bajira'),
        array(12,'Carmén Del Darién'),
        array(12,'Riosucio'),
        array(12,'Unguía'),
        array(12,'Bahía Solano'),
        array(12,'Juradó'),
        array(12,'Nuquí'),
        array(12,'Alto Baudó'),
        array(12,'Bajo Baudó'),
        array(12,'El Litoral Del San Juan'),
        array(12,'Medio Baudó'),
        array(12,'Canton De San Pablo'),
        array(12,'Certegui'),
        array(12,'Condoto'),
        array(12,'Itsmina'),
        array(12,'Medio San Juan'),
        array(12,'Nóvita'),
        array(12,'Río Frío'),
        array(12,'San José Del Palmar'),
        array(12,'Sipí'),
        array(12,'Tadó'),
        array(12,'Union Panamericana'),
        array(13,'Tierralta'),
        array(13,'Valencia'),
        array(13,'Chimá'),
        array(13,'Cotorra'),
        array(13,'Lorica'),
        array(13,'Momil'),
        array(13,'Purísima'),
        array(13,'Montería'),
        array(13,'Canalete'),
        array(13,'Los Córdobas'),
        array(13,'Moñitos'),
        array(13,'Puerto Escondido'),
        array(13,'San Antero'),
        array(13,'San Bernardo Del Viento'),
        array(13,'Chinú'),
        array(13,'Sahagún'),
        array(13,'San Andrés Sotavento'),
        array(13,'Ayapel'),
        array(13,'Buenavista'),
        array(13,'La Apartada'),
        array(13,'Montelíbano'),
        array(13,'Planeta Rica'),
        array(13,'Pueblo Nuevo'),
        array(13,'Puerto Libertador'),
        array(13,'Cereté'),
        array(13,'Ciénaga De Oro'),
        array(13,'San Carlos'),
        array(13,'San Pelayo'),
        array(14,'Chocontá'),
        array(14,'Macheta'),
        array(14,'Manta'),
        array(14,'Sesquilé'),
        array(14,'Suesca'),
        array(14,'Tibirita'),
        array(14,'Villapinzón'),
        array(14,'Agua De Dios'),
        array(14,'Girardot'),
        array(14,'Guataquí'),
        array(14,'Jerusalén'),
        array(14,'Nariño'),
        array(14,'Nilo'),
        array(14,'Ricaurte'),
        array(14,'Tocaima'),
        array(14,'Caparrapí'),
        array(14,'Guaduas'),
        array(14,'Puerto Salgar'),
        array(14,'Albán'),
        array(14,'La Peña'),
        array(14,'La Vega'),
        array(14,'Nimaima'),
        array(14,'Nocaima'),
        array(14,'Quebradanegra'),
        array(14,'San Francisco'),
        array(14,'Sasaima'),
        array(14,'Supatá'),
        array(14,'Útica'),
        array(14,'Vergara'),
        array(14,'Villeta'),
        array(14,'Gachala'),
        array(14,'Gacheta'),
        array(14,'Gama'),
        array(14,'Guasca'),
        array(14,'Guatavita'),
        array(14,'Junín'),
        array(14,'La Calera'),
        array(14,'Ubalá'),
        array(14,'Beltrán'),
        array(14,'Bituima'),
        array(14,'Chaguaní'),
        array(14,'Guayabal De Siquima'),
        array(14,'Puli'),
        array(14,'San Juan De Río Seco'),
        array(14,'Vianí'),
        array(14,'Medina'),
        array(14,'Paratebueno'),
        array(14,'Caqueza'),
        array(14,'Chipaque'),
        array(14,'Choachí'),
        array(14,'Fomeque'),
        array(14,'Fosca'),
        array(14,'Guayabetal'),
        array(14,'Gutiérrez'),
        array(14,'Quetame'),
        array(14,'Ubaque'),
        array(14,'Une'),
        array(14,'El Peñón'),
        array(14,'La Palma'),
        array(14,'Pacho'),
        array(14,'Paime'),
        array(14,'San Cayetano'),
        array(14,'Topaipi'),
        array(14,'Villagomez'),
        array(14,'Yacopí'),
        array(14,'Cajicá'),
        array(14,'Chía'),
        array(14,'Cogua'),
        array(14,'Gachancipá'),
        array(14,'Nemocon'),
        array(14,'Sopó'),
        array(14,'Tabio'),
        array(14,'Tocancipá'),
        array(14,'Zipaquirá'),
        array(14,'Bojacá'),
        array(14,'Cota'),
        array(14,'El Rosal'),
        array(14,'Facatativá'),
        array(14,'Funza'),
        array(14,'Madrid'),
        array(14,'Mosquera'),
        array(14,'Subachoque'),
        array(14,'Tenjo'),
        array(14,'Zipacon'),
        array(14,'Sibaté'),
        array(14,'Soacha'),
        array(14,'Arbeláez'),
        array(14,'Cabrera'),
        array(14,'Fusagasugá'),
        array(14,'Granada'),
        array(14,'Pandi'),
        array(14,'Pasca'),
        array(14,'San Bernardo'),
        array(14,'Silvania'),
        array(14,'Tibacuy'),
        array(14,'Venecia'),
        array(14,'Anapoima'),
        array(14,'Anolaima'),
        array(14,'Apulo'),
        array(14,'Cachipay'),
        array(14,'El Colegio'),
        array(14,'La Mesa'),
        array(14,'Quipile'),
        array(14,'San Antonio De Tequendama'),
        array(14,'Tena'),
        array(14,'Viotá'),
        array(14,'Carmen De Carupa'),
        array(14,'Cucunubá'),
        array(14,'Fúquene'),
        array(14,'Guachetá'),
        array(14,'Lenguazaque'),
        array(14,'Simijaca'),
        array(14,'Susa'),
        array(14,'Sutatausa'),
        array(14,'Tausa'),
        array(14,'Ubate'),
        array(15,'Barranco Mina'),
        array(15,'Cacahual'),
        array(15,'Inírida'),
        array(15,'La Guadalupe'),
        array(15,'Mapiripan'),
        array(15,'Morichal'),
        array(15,'Pana Pana'),
        array(15,'Puerto Colombia'),
        array(15,'San Felipe'),
        array(16,'Calamar'),
        array(16,'El Retorno'),
        array(16,'Miraflores'),
        array(16,'San José Del Guaviare'),
        array(17,'Agrado'),
        array(17,'Altamira'),
        array(17,'Garzón'),
        array(17,'Gigante'),
        array(17,'Guadalupe'),
        array(17,'Pital'),
        array(17,'Suaza'),
        array(17,'Tarqui'),
        array(17,'Aipe'),
        array(17,'Algeciras'),
        array(17,'Baraya'),
        array(17,'Campoalegre'),
        array(17,'Colombia'),
        array(17,'Hobo'),
        array(17,'Iquira'),
        array(17,'Neiva'),
        array(17,'Palermo'),
        array(17,'Rivera'),
        array(17,'Santa María'),
        array(17,'Tello'),
        array(17,'Teruel'),
        array(17,'Villavieja'),
        array(17,'Yaguará'),
        array(17,'La Argentina'),
        array(17,'La Plata'),
        array(17,'Nátaga'),
        array(17,'Paicol'),
        array(17,'Tesalia'),
        array(17,'Acevedo'),
        array(17,'Elías'),
        array(17,'Isnos'),
        array(17,'Oporapa'),
        array(17,'Palestina'),
        array(17,'Pitalito'),
        array(17,'Saladoblanco'),
        array(17,'San Agustín'),
        array(17,'Timaná'),
        array(18,'Albania'),
        array(18,'Dibulla'),
        array(18,'Maicao'),
        array(18,'Manaure'),
        array(18,'Riohacha'),
        array(18,'Uribia'),
        array(18,'Barrancas'),
        array(18,'Distraccion'),
        array(18,'El Molino'),
        array(18,'Fonseca'),
        array(18,'Hatonuevo'),
        array(18,'La Jagua Del Pilar'),
        array(18,'San Juan Del Cesar'),
        array(18,'Urumita'),
        array(18,'Villanueva'),
        array(19,'Ariguaní'),
        array(19,'Chibolo'),
        array(19,'Nueva Granada'),
        array(19,'Plato'),
        array(19,'Sabanas De San Angel'),
        array(19,'Tenerife'),
        array(19,'Algarrobo'),
        array(19,'Aracataca'),
        array(19,'Ciénaga'),
        array(19,'El Reten'),
        array(19,'Fundacion'),
        array(19,'Pueblo Viejo'),
        array(19,'Zona Bananera'),
        array(19,'Cerro San Antonio'),
        array(19,'Concordia'),
        array(19,'El Piñon'),
        array(19,'Pedraza'),
        array(19,'Pivijay'),
        array(19,'Remolino'),
        array(19,'Salamina'),
        array(19,'Sitionuevo'),
        array(19,'Zapayan'),
        array(19,'Santa Marta'),
        array(19,'El Banco'),
        array(19,'Guamal'),
        array(19,'Pijiño Del Carmen'),
        array(19,'San Sebastian De Buenavista'),
        array(19,'San Zenon'),
        array(19,'Santa Ana'),
        array(19,'Santa Barbara De Pinto'),
        array(20,'El Castillo'),
        array(20,'El Dorado'),
        array(20,'Fuente De Oro'),
        array(20,'Granada'),
        array(20,'La Macarena'),
        array(20,'La Uribe'),
        array(20,'Lejanías'),
        array(20,'Mapiripan'),
        array(20,'Mesetas'),
        array(20,'Puerto Concordia'),
        array(20,'Puerto Lleras'),
        array(20,'Puerto Rico'),
        array(20,'San Juan De Arama'),
        array(20,'Vista Hermosa'),
        array(20,'Villavicencio'),
        array(20,'Acacias'),
        array(20,'Barranca De Upia'),
        array(20,'Castilla La Nueva'),
        array(20,'Cumaral'),
        array(20,'El Calvario'),
        array(20,'Guamal'),
        array(20,'Restrepo'),
        array(20,'San Carlos Guaroa'),
        array(20,'San Juanito'),
        array(20,'San Luis De Cubarral'),
        array(20,'San Martín'),
        array(20,'Cabuyaro'),
        array(20,'Puerto Gaitán'),
        array(20,'Puerto Lopez'),
        array(21,'Chachagui'),
        array(21,'Consaca'),
        array(21,'El Peñol'),
        array(21,'El Tambo'),
        array(21,'La Florida'),
        array(21,'Nariño'),
        array(21,'Pasto'),
        array(21,'Sandoná'),
        array(21,'Tangua'),
        array(21,'Yacuanquer'),
        array(21,'Ancuya'),
        array(21,'Guaitarilla'),
        array(21,'La Llanada'),
        array(21,'Linares'),
        array(21,'Los Andes'),
        array(21,'Mallama'),
        array(21,'Ospina'),
        array(21,'Providencia'),
        array(21,'Ricaurte'),
        array(21,'Samaniego'),
        array(21,'Santa Cruz'),
        array(21,'Sapuyes'),
        array(21,'Tuquerres'),
        array(21,'Barbacoas'),
        array(21,'El Charco'),
        array(21,'Francisco Pizarro'),
        array(21,'La Tola'),
        array(21,'Magui'),
        array(21,'Mosquera'),
        array(21,'Olaya Herrera'),
        array(21,'Roberto Payan'),
        array(21,'Santa Barbara'),
        array(21,'Tumaco'),
        array(21,'Alban'),
        array(21,'Arboleda'),
        array(21,'Belen'),
        array(21,'Buesaco'),
        array(21,'Colon'),
        array(21,'Cumbitara'),
        array(21,'El Rosario'),
        array(21,'El Tablon De Gomez'),
        array(21,'La Cruz'),
        array(21,'La Union'),
        array(21,'Leiva'),
        array(21,'Policarpa'),
        array(21,'San Bernardo'),
        array(21,'San Lorenzo'),
        array(21,'San Pablo'),
        array(21,'San Pedro De Cartago'),
        array(21,'Taminango'),
        array(21,'Aldana'),
        array(21,'Contadero'),
        array(21,'Córdoba'),
        array(21,'Cuaspud'),
        array(21,'Cumbal'),
        array(21,'Funes'),
        array(21,'Guachucal'),
        array(21,'Gualmatan'),
        array(21,'Iles'),
        array(21,'Imues'),
        array(21,'Ipiales'),
        array(21,'Potosí'),
        array(21,'Puerres'),
        array(21,'Pupiales'),
        array(22,'Arboledas'),
        array(22,'Cucutilla'),
        array(22,'Gramalote'),
        array(22,'Lourdes'),
        array(22,'Salazar'),
        array(22,'Santiago'),
        array(22,'Villa Caro'),
        array(22,'Bucarasica'),
        array(22,'El Tarra'),
        array(22,'Sardinata'),
        array(22,'Tibú'),
        array(22,'Abrego'),
        array(22,'Cachirá'),
        array(22,'Convención'),
        array(22,'El Carmen'),
        array(22,'Hacarí'),
        array(22,'La Esperanza'),
        array(22,'La Playa'),
        array(22,'Ocaña'),
        array(22,'San Calixto'),
        array(22,'Teorama'),
        array(22,'Cúcuta'),
        array(22,'El Zulia'),
        array(22,'Los Patios'),
        array(22,'Puerto Santander'),
        array(22,'San Cayetano'),
        array(22,'Villa Del Rosario'),
        array(22,'Cácota'),
        array(22,'Chitagá'),
        array(22,'Mutiscua'),
        array(22,'Pamplona'),
        array(22,'Pamplonita'),
        array(22,'Silos'),
        array(22,'Bochalema'),
        array(22,'Chinácota'),
        array(22,'Durania'),
        array(22,'Herrán'),
        array(22,'Labateca'),
        array(22,'Ragonvalia'),
        array(22,'Toledo'),
        array(23,'Colón'),
        array(23,'Mocoa'),
        array(23,'Orito'),
        array(23,'Puerto Asis'),
        array(23,'Puerto Caicedo'),
        array(23,'Puerto Guzman'),
        array(23,'Puerto Leguizamo'),
        array(23,'San Francisco'),
        array(23,'San Miguel'),
        array(23,'Santiago'),
        array(23,'Sibundoy'),
        array(23,'Valle Del Guamuez'),
        array(23,'Villa Garzon'),
        array(24,'Armenia'),
        array(24,'Buenavista'),
        array(24,'Calarca'),
        array(24,'Cordoba'),
        array(24,'Genova'),
        array(24,'Pijao'),
        array(24,'Filandia'),
        array(24,'Salento'),
        array(24,'Circasia'),
        array(24,'La Tebaida'),
        array(24,'Montengro'),
        array(24,'Quimbaya'),
        array(25,'Dosquebradas'),
        array(25,'La Virginia'),
        array(25,'Marsella'),
        array(25,'Pereira'),
        array(25,'Santa Rosa De Cabal'),
        array(25,'Apía'),
        array(25,'Balboa'),
        array(25,'Belén De Umbría'),
        array(25,'Guática'),
        array(25,'La Celia'),
        array(25,'Quinchia'),
        array(25,'Santuario'),
        array(25,'Mistrató'),
        array(25,'Pueblo Rico'),
        array(27,'Chima'),
        array(27,'Confines'),
        array(27,'Contratación'),
        array(27,'El Guacamayo'),
        array(27,'Galán'),
        array(27,'Gambita'),
        array(27,'Guadalupe'),
        array(27,'Guapotá'),
        array(27,'Hato'),
        array(27,'Oiba'),
        array(27,'Palmar'),
        array(27,'Palmas Del Socorro'),
        array(27,'Santa Helena Del Opón'),
        array(27,'Simacota'),
        array(27,'Socorro'),
        array(27,'Suaita'),
        array(27,'Capitanejo'),
        array(27,'Carcasí'),
        array(27,'Cepitá'),
        array(27,'Cerrito'),
        array(27,'Concepción'),
        array(27,'Enciso'),
        array(27,'Guaca'),
        array(27,'Macaravita'),
        array(27,'Málaga'),
        array(27,'Molagavita'),
        array(27,'San Andrés'),
        array(27,'San José De Miranda'),
        array(27,'San Miguel'),
        array(27,'Aratoca'),
        array(27,'Barichara'),
        array(27,'Cabrera'),
        array(27,'Charalá'),
        array(27,'Coromoro'),
        array(27,'Curití'),
        array(27,'Encino'),
        array(27,'Jordán'),
        array(27,'Mogotes'),
        array(27,'Ocamonte'),
        array(27,'Onzaga'),
        array(27,'Páramo'),
        array(27,'Pinchote'),
        array(27,'San Gil'),
        array(27,'San Joaquín'),
        array(27,'Valle De San José'),
        array(27,'Villanueva'),
        array(27,'Barrancabermeja'),
        array(27,'Betulia'),
        array(27,'El Carmen De Chucurí'),
        array(27,'Puerto Wilches'),
        array(27,'Sabana De Torres'),
        array(27,'San Vicente De Chucurí'),
        array(27,'Zapatoca'),
        array(27,'Bucaramanga'),
        array(27,'California'),
        array(27,'Charta'),
        array(27,'El Playón'),
        array(27,'Floridablanca'),
        array(27,'Girón'),
        array(27,'Lebríja'),
        array(27,'Los Santos'),
        array(27,'Matanza'),
        array(27,'Piedecuesta'),
        array(27,'Rionegro'),
        array(27,'Santa Bárbara'),
        array(27,'Surata'),
        array(27,'Tona'),
        array(27,'Vetas'),
        array(27,'Aguada'),
        array(27,'Albania'),
        array(27,'Barbosa'),
        array(27,'Bolívar'),
        array(27,'Chipatá'),
        array(27,'Cimitarra'),
        array(27,'El Peñón'),
        array(27,'Florián'),
        array(27,'Guavatá'),
        array(27,'Guepsa'),
        array(27,'Jesús María'),
        array(27,'La Belleza'),
        array(27,'La Paz'),
        array(27,'Landázuri'),
        array(27,'Puente Nacional'),
        array(27,'Puerto Parra'),
        array(27,'San Benito'),
        array(27,'Sucre'),
        array(27,'Vélez'),
        array(28,'Guaranda'),
        array(28,'Majagual'),
        array(28,'Sucre'),
        array(28,'Chalán'),
        array(28,'Coloso'),
        array(28,'Morroa'),
        array(28,'Ovejas'),
        array(28,'Sincelejo'),
        array(28,'Coveñas'),
        array(28,'Palmito'),
        array(28,'San Onofre'),
        array(28,'Santiago De Tolú'),
        array(28,'Tolú Viejo'),
        array(28,'Buenavista'),
        array(28,'Corozal'),
        array(28,'El Roble'),
        array(28,'Galeras'),
        array(28,'Los Palmitos'),
        array(28,'Sampués'),
        array(28,'San Juan Betulia'),
        array(28,'San Pedro'),
        array(28,'Sincé'),
        array(28,'Caimito'),
        array(28,'La Unión'),
        array(28,'San Benito Abad'),
        array(28,'San Marcos'),
        array(29,'Ambalema'),
        array(29,'Armero'),
        array(29,'Falan'),
        array(29,'Fresno'),
        array(29,'Honda'),
        array(29,'Mariquita'),
        array(29,'Palocabildo'),
        array(29,'Carmen De Apicalá'),
        array(29,'Cunday'),
        array(29,'Icononzo'),
        array(29,'Melgar'),
        array(29,'Villarrica'),
        array(29,'Ataco'),
        array(29,'Chaparral'),
        array(29,'Coyaima'),
        array(29,'Natagaima'),
        array(29,'Ortega'),
        array(29,'Planadas'),
        array(29,'Rioblanco'),
        array(29,'Roncesvalles'),
        array(29,'San Antonio'),
        array(29,'Alvarado'),
        array(29,'Anzoátegui'),
        array(29,'Cajamarca'),
        array(29,'Coello'),
        array(29,'Espinal'),
        array(29,'Flandes'),
        array(29,'Ibague'),
        array(29,'Piedras'),
        array(29,'Rovira'),
        array(29,'San Luis'),
        array(29,'Valle De San Juan'),
        array(29,'Alpujarra'),
        array(29,'Dolores'),
        array(29,'Guamo'),
        array(29,'Prado'),
        array(29,'Purificación'),
        array(29,'Saldaña'),
        array(29,'Suárez'),
        array(29,'Casabianca'),
        array(29,'Herveo'),
        array(29,'Lerida'),
        array(29,'Libano'),
        array(29,'Murillo'),
        array(29,'Santa Isabel'),
        array(29,'Venadillo'),
        array(29,'Villahermosa'),
        array(30,'Andalucía'),
        array(30,'Buga'),
        array(30,'Bugalagrande'),
        array(30,'Calima'),
        array(30,'El Cerrito'),
        array(30,'Ginebra'),
        array(30,'Guacarí'),
        array(30,'Restrepo'),
        array(30,'Riofrio'),
        array(30,'San Pedro'),
        array(30,'Trujillo'),
        array(30,'Tuluá'),
        array(30,'Yotoco'),
        array(30,'Alcala'),
        array(30,'Ansermanuevo'),
        array(30,'Argelia'),
        array(30,'Bolívar'),
        array(30,'Cartago'),
        array(30,'El Águila'),
        array(30,'El Cairo'),
        array(30,'El Dovio'),
        array(30,'La Unión'),
        array(30,'La Victoria'),
        array(30,'Obando'),
        array(30,'Roldanillo'),
        array(30,'Toro'),
        array(30,'Ulloa'),
        array(30,'Versalles'),
        array(30,'Zarzal'),
        array(30,'Buenaventura'),
        array(30,'Caicedonia'),
        array(30,'Sevilla'),
        array(30,'Cali'),
        array(30,'Candelaria'),
        array(30,'Dagua'),
        array(30,'Florida'),
        array(30,'Jamundí'),
        array(30,'La Cumbre'),
        array(30,'Palmira'),
        array(30,'Pradera'),
        array(30,'Vijes'),
        array(30,'Yumbo'),
        array(31,'Caruru'),
        array(31,'Mitú'),
        array(31,'Pacoa'),
        array(31,'Papunahua'),
        array(31,'Taraira'),
        array(31,'Yavaraté'),
        array(32,'Cumaribo'),
        array(32,'La Primavera'),
        array(32,'Puerto Carreño'),
        array(32,'Santa Rosalía'),        
    );
    
    foreach ($municipios as $municipio){
        $sql='INSERT INTO '.$tabla.' (idDepartamento, nombre) 
            VALUES ('.$municipio[0].',"'.$municipio[1].'")';
            //echo $sql;
            insertar();		
    }
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

    //########## INGRESAR CONTENIDO A LA TABLA "JORNADAS" ##########
        $jornadas = array(
            array(1,"Mañana"),
            array(2,"Tarde"),
            array(3,"Sabatina"),
            );
        
        foreach ($jornadas as $jornada){
            $sql='INSERT INTO '.$tabla.' (id, nombre) 
                VALUES ('.$jornada[0].',"'.$jornada[1].'")';
                insertar();		
        }
        
//########## CREAR UNA TABLA DE "JORNADAS POR SEDE" ##########
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

    //########## INGRESAR CONTENIDO A LA TABLA "GRADOS" ##########
        $grados = array(
            array(1,"Preescolar"),
            array(2,"Primero"),
            array(3,"Segundo"),
            array(4,"Tercero"),
            array(5,"Cuarto"),
            array(6,"Quinto"),
            array(7,"Sexto"),
            array(8,"Séptimo"),
            array(9,"Octavo"),
            array(10,"Noveno"),
            array(11,"Décimo"),
            array(12,"Once"),
            );
        
        foreach ($grados as $grado){
            $sql='INSERT INTO '.$tabla.' (id, nombre) 
                VALUES ('.$grado[0].',"'.$grado[1].'")';
                insertar();		
        }
        
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

    //########## INGRESAR CONTENIDO A LA TABLA "GRUPOS" ##########
        $grupos = array(
            array(1,"0.1"),
            array(2,"1.1"),
            array(3,"2.1"),
            array(4,"3.1"),
            array(5,"4.1"),
            array(6,"5.1"),
            array(7,"6.1"),
            array(8,"7.1"),
            array(9,"8.1"),
            array(10,"9.1"),
            array(11,"10.1"),
            array(12,"11.1"),
            );
        
        foreach ($grupos as $grupo){
            $sql='INSERT INTO '.$tabla.' (id, nombre) 
                VALUES ('.$grupo[0].',"'.$grupo[1].'")';
                insertar();		
        }   
//########## CREAR UNA TABLA DE "GRUPOS POR GRADO" ##########
	// Preparamos la consulta SQL
	$tabla = 'gruposXgrado';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int(4) NOT NULL AUTO_INCREMENT,
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

    //########## INGRESAR CONTENIDO A LA TABLA "ÁREAS" ##########
        $areas = array(
            array(1,"Matemáticas"),
            array(2,"Ciencias"),
            array(3,"Lenguaje"),
            array(4,"Convivencia"),
            array(5,"Socialización"),
            array(6,"Participación"),
            array(7,"Autonomía"),
            array(8,"Autocontrol"),
            );
        
        foreach ($areas as $area){
            $sql='INSERT INTO '.$tabla.' (id, nombre) 
                VALUES ('.$area[0].',"'.$area[1].'")';
                insertar();		
        }

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

    //########## INGRESAR CONTENIDO A LA TABLA "PERIODOS" ##########
        $periodos = array(
            array(1,"Primero"),
            array(2,"Segundo"),
            array(3,"Tercero"),
            array(4,"Cuarto"),
            );
        
        foreach ($periodos as $periodo){
            $sql='INSERT INTO '.$tabla.' (id, nombre) 
                VALUES ('.$periodo[0].',"'.$periodo[1].'")';
                insertar();		
        }

//########## CREAR UNA TABLA DE "PERIODOS POR ÁREA" ##########
	// Preparamos la consulta SQL
	$tabla = 'periodosXarea';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int(2) NOT NULL AUTO_INCREMENT,
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
				id int(2) NOT NULL AUTO_INCREMENT,
				tipo varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## INGRESAR CONTENIDO A LA TABLA "TIPOS DE DOCUMENTO" ##########
        $tipos = array(
            array(1,"Registro Cívil"),
            array(2,"Tarjeta de Identidad"),
            array(3,"Cédula de Ciudadanía"),
            array(4,"Cédula de Extranjería"),
            array(5,"Permiso Especial de Permanencia"),
            array(6,"NES"),
            array(7,"Pasaporte"),
            array(8,"Visa"),
            );
        
        foreach ($tipos as $tipo){
            $sql='INSERT INTO '.$tabla.' (id, nombre) 
                VALUES ('.$tipo[0].',"'.$tipo[1].'")';
                insertar();		
        }

//########## CREAR UNA TABLA DE "GRUPOS ÉTNICOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'gruposEtnicos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int(2) NOT NULL AUTO_INCREMENT,
				name varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## INGRESAR CONTENIDO A LA TABLA "GRUPOS ÉTNICOS" ##########
        $etnias = array(
            array(1,"Afrodescendiente"),
            array(2,"Indígena"),
            array(3,"Raizal"),
            array(4,"Rrom"),
            );
        
        foreach ($etnias as $etnia){
            $sql='INSERT INTO '.$tabla.' (id, name) 
                VALUES ('.$etnia[0].',"'.$etnia[1].'")';
                insertar();		
        }     
   
//########## CREAR UNA TABLA DE "CENTROS DE PROTECCIÓN" ##########
	// Preparamos la consulta SQL
    $tabla = 'centrosDEproteccion';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int(2) NOT NULL AUTO_INCREMENT,
				name varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

//########## CREAR UNA TABLA DE "EPS" ##########
	// Preparamos la consulta SQL
    $tabla = 'eps';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int(2) NOT NULL AUTO_INCREMENT,
				nombre varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();

    //########## INGRESAR CONTENIDO A LA TABLA "EPS" ##########
        $empresas = array(
            array(1,"SISBEN"),
            array(2,'ALIANSALUD E.P.S.'),
            array(3,'SALUD TOTAL S.A.'),
            array(4,'CAFESALUD E.P.S.'),
            array(5,'E.P.S. SANITAS'),
            array(6,'COMPENSAR E.P.S.'),
            array(7,'EPS Y MEDICINA PREPAGADA SURAMERICANA S.A.'),
            array(8,'COMFENALCO VALLE'),
            array(9,'COOMEVA E.P.S. S.A.'),
            array(10,'FAMISANAR E.P.S. LTDA - CAFAM - COLSUBSIDIO'),
            array(11,'SERVICIO OCCIDENTAL DE SALUD - S.O.S. S.A.'),
            array(12,'CRUZ BLANCA E.P.S.'),
            array(13,'SALUDVIDA S.A. E.P.S.'),
            array(14,'NUEVA EPS S.A. '),
            array(15,'COOPERATIVA DE SALUD Y DESARROLLO INTEGRAL ZONA SUR ORIENTAL DE CARTAGENA - COOSALUD'),
            array(16,'MEDIMÁS EPS S.A.S. CONTRIBUTIVO'),
            array(17,'A.R.S. CONVIDA'),
            array(18,'CAJA DE PREVISION SOCIAL Y SEGURIDAD DEL CASANARE - CAPRESOCA E.P.S. S.A.'),

            );
        
        foreach ($empresas as $empresa){
            $sql='INSERT INTO '.$tabla.' (id, nombre) 
                VALUES ('.$empresa[0].',"'.$empresa[1].'")';
                insertar();		
        }

//########## CREAR UNA TABLA DE "AFILIACIONES" ##########
	// Preparamos la consulta SQL
    $tabla = 'afiliaciones';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                eps int(2) NOT NULL,
                idOpcionesAfiliado int(2) NOT NULL,
                frecuencia int(2) NOT NULL,
				lugar varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),
                FOREIGN KEY(eps) REFERENCES eps (id),
                FOREIGN KEY(idOpcionesAfiliado) REFERENCES opciones (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    
//########## CREAR UNA TABLA DE "DIAGNÓSTICOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'diagnosticos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                descripcion varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    
//########## CREAR UNA TABLA DE "TRATAMIENTOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'tratamientos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                descripcion varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    
//########## CREAR UNA TABLA DE "MEDICAMENTOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'medicamentos';
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
    
//########## CREAR UNA TABLA DE "FRECUENCIAS" ##########
	// Preparamos la consulta SQL
    $tabla = 'frecuencias';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                descripcion varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    
    //########## INGRESAR CONTENIDO A LA TABLA "FRECUENCIAS" ##########
    $tiempos = array(
        array(1,'Cada hora'),
        array(2,'Cada 2 horas'),
        array(3,'Cada 4 horas'),
        array(4,'Cada 6 horas'),
        array(5,'Cada 8 horas'),
        array(6,'Cada 10 horas'),
        array(7,'Cada 12 horas'),
        array(8,'Cada 24 horas'),
        array(9,'Cada 2 días'),
        array(10,'Cada 3 días'),
        array(11,'Cada 4 días'),
        array(12,'Cada 5 días'),
        array(13,'Cada 6 días'),
        array(14,'Cada semana'),
        array(15,'Cada 2 semanas'),
        array(16,'Cada 3 semanas'),
        array(17,'Cada mes'),
        array(18,'Cada 2 meses'),
        array(19,'Cada 3 meses'),
        array(20,'Cada 4 meses'),
        array(21,'Cada 5 meses'),
        array(22,'Cada 6 meses'),
        array(23,'Cada 7 meses'),
        array(24,'Cada 8 meses'),
        array(25,'Cada 9 meses'),
        array(26,'Cada 10 meses'),
        array(27,'Cada 11 meses'),
        array(28,'Cada año'),
        array(29,'Cada 2 años'),
        array(30,'Cada 3 años'),
        array(31,'Cada 4 años'),
        array(32,'Cada 5 años'),
        );
    
    foreach ($tiempos as $tiempo){
        $sql='INSERT INTO '.$tabla.' (id, descripcion) 
            VALUES ('.$tiempo[0].',"'.$tiempo[1].'")';
            insertar();		
    }

    
//########## CREAR UNA TABLA DE "CONSUMOS" ##########
	// Preparamos la consulta SQL
    $tabla = 'consumos';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                idMedicamento int(2) NOT NULL,
                idFrecuencia int(2) NOT NULL,
                horario varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
				PRIMARY KEY(id),
                FOREIGN KEY(idMedicamento) REFERENCES medicamentos (id),
                FOREIGN KEY(idFrecuencia) REFERENCES frecuencias (id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    
//########## CREAR UNA TABLA DE "TERAPIAS" ##########
	// Preparamos la consulta SQL
    $tabla = 'terapias';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                terapia1 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                terapia2 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                terapia3 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                idFrecuencia1 int(2) NOT NULL,
                idFrecuencia2 int(2) NOT NULL,
                idFrecuencia3 int(2) NOT NULL,
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
    
//########## CREAR UNA TABLA DE "MADRES" ##########
	// Preparamos la consulta SQL
    $tabla = 'madres';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                nomMadre(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                docMadre int(10) NOT NULL,
                
				PRIMARY KEY(id)
			)
		';
	//Ejecutar
	ejecutarConsulta();
  //########## CREAR UNA TABLA DE "ENTORNO FAMILIAR" ##########
	// Preparamos la consulta SQL
    $tabla = 'entornoFamiliar';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
				id int NOT NULL AUTO_INCREMENT,
                nomMadre(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                docMadre int(10) NOT NULL,
                terapia2 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                terapia3 varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                idFrecuencia1 int(2) NOT NULL,
                idFrecuencia2 int(2) NOT NULL,
                idFrecuencia3 int(2) NOT NULL,
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
                idGrupo int(4) NOT NULL,
                email varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
                telefono int(10) NOT NULL,
                idTipoDoc int(2) NOT NULL,
                documento int(10) NOT NULL,
                fechaNacimiento date NOT NULL,
                edad int(2) NOT NULL,
                lugarHermanos int(2) NOT NULL,
                viveCon varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                victima boolean NOT NULL,
                registroVictima boolean NOT NULL,
                idGrupoEtnico int(2) NOT NULL,
                idCentroProteccion int(2) NOT NULL,
                idAfiliacion int(2) NOT NULL,
                idDiagnostico int(2) NOT NULL,
                idTratamiento int(2) NOT NULL,
                idApoyo int(2) NOT NULL,
				PRIMARY KEY(id),
                FOREIGN KEY(idGrupo) REFERENCES gruposXgrado (id),
                FOREIGN KEY(idTipoDoc) REFERENCES tiposDocumento (id),
                FOREIGN KEY(idGrupoEtnico) REFERENCES gruposEtnicos (id),
                FOREIGN KEY(idCentroProteccion) REFERENCES centrosDEproteccion (id),
                FOREIGN KEY(idAfiliacion) REFERENCES afiliaciones (id),
                FOREIGN KEY(idDiagnostico) REFERENCES diagnosticos (id),
                FOREIGN KEY(idTratamiento) REFERENCES tratamientos (id),
                FOREIGN KEY(idApoyo) REFERENCES apoyos (id)


			)
		';
	//Ejecutar
	ejecutarConsulta();

    //################### CREAR UNA TABLA DE "USUARIOS". ###################
	//Preparar consulta SQL
	$tabla='usuarios';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(			
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



//################### CREAR UNA TABLA DE LOGS. ###################
	
	//Preparar
	$tabla='logs';
	$sql=
		'
			CREATE TABLE IF NOT EXISTS '.$tabla.'(
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
	mysqli_close($cnx);
	
	echo "<div> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='index.php'>Volver</a> </div>";

	

?>
	</body>
</html>