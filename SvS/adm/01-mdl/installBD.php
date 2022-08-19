<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bd.css">
	</head>
	<body>
<?php
//Establecer conexion
	include('cnx.php');
	echo"
        <div> <a href='index.php'>Volver</a> || <a href='mostrarTablasenBD.php'>Mostrar Base de Datos</a> <br><br></div>
        <div> <H1>===== RESUMEN DE INSTALACIÓN ===== </H1><br><br></div>
    ";
//################### Creamos las funciones ejecutarConsulta() e insertar(). ###################		
    function ejecutarConsulta(){
        global $sql;
        global $cnx;
        global $tabla;
        if($query=$cnx->query($sql)){   
            echo "
                <div>========================= CREACIÓN DE LA TABLA '".strtoupper($tabla)."' =========================
                <br>====================================================================================<br></div>
                <div> Se creó la tabla <span>'".strtoupper($tabla)."'</span> con exito.<br><br></div>
            ";		
        }else{
            echo "
                <div><p class='rojo'>========================= CREACIÓN DE LA TABLA '".strtoupper($tabla)."' =========================</p>
                <br>====================================================================================<br></div>
                <div><p class='rojo'>No se pudo crear la tabla'".strtoupper($tabla)."'. Razón: [".mysqli_error($cnx)."]</p><br><br></div>
            ";		
        }
    }	
    function insertar(){
        set_time_limit(600);
        global $sql;
        global $cnx;
        global $tabla;		
        if ($query=$cnx->query($sql)){
            echo"
                <div>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></div>
                <div>Se insertaron los datos exitosamente.<br><br></div>"
            ;			
        }else{
            echo"
                <div><p class='rojo'>===== INSERTANDO REGISTROS EN LA TABLA ".strtoupper($tabla)."======<br><br></p></div>
                <div><p class='rojo'>No se insertaron los datos. ".mysqli_error($cnx)."</p><br><br></div>
            ";		
        }
    }
//########## CREAR UNA TABLA DE "instalacion" ##########
	// Preparamos la consulta SQL
	$tabla = 'instalacion';
	$sql='
        CREATE TABLE IF NOT EXISTS '.$tabla.'(
            codInstalacion int(1) NOT NULL,
            PRIMARY KEY(codInstalacion),
            confirmacion int(1) NOT NULL
        )
	';
	//Ejecutar
	ejecutarConsulta();
    //########## INGRESAR CONTENIDO A LA TABLA "instalacion" ##########	
	$sql='
        INSERT INTO '.$tabla.' (codInstalacion, confirmacion) 
		VALUES (1,1)
    ';
	insertar();
//########## CREAR UNA TABLA DE "sinai" ##########
	// Preparamos la consulta SQL
	$tabla = 'sinai';
	$sql='
        CREATE TABLE IF NOT EXISTS '.$tabla.' (
            id int(4) NOT NULL AUTO_INCREMENT,
            grupo varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaEstado date,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            tipoDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            numDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaNacimiento date,
            telefono varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            eps varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            direccion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            pais varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            PRIMARY KEY(id)
        )
    ';
	//Ejecutar
	ejecutarConsulta();    
//########## CREAR UNA TABLA DE "simat" ##########
	// Preparamos la consulta SQL
	$tabla = 'simat';
	$sql='
        CREATE TABLE IF NOT EXISTS '.$tabla.' (
            id int(4) NOT NULL AUTO_INCREMENT,
            grupo varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estado varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaEstado date,
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            tipoDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            numDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaNacimiento date,
            telefono varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            eps varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            direccion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            pais varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estrategiaPAE int(1) NOT NULL,
            estrategiaTransporte int(1) NOT NULL,
            PRIMARY KEY(id)
        )
    ';
	//Ejecutar
	ejecutarConsulta();    
//################### CREAR UNA TABLA DE "USUARIOS". ###################
	//Preparar consulta SQL
	$tabla='usuarios';
	$sql='
        CREATE TABLE '.$tabla.'(			
            institucionID int NOT NULL AUTO_INCREMENT,
            dane varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            contrasena varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            institucion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            correoInstitucional varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            defUsuario int NOT NULL ,
            permiso int(1) NOT NULL,
            PRIMARY KEY(usuarioID)			
            )
    ';	
	//Ejecutar	
	ejecutarConsulta();
	
//################### CONTENIDO DE PRUEBA PARA LA TABLA "USUARIOS". ###################
	$usuarios = array(
		//(responsableCED, usuario, contrasena, nombres, apellidos, defUsuario, permiso)
		/*
			Niveles de usuarios
				
				0	Visitante //Usuario visitante (No tiene bienes a cargos, no administra)
				1	Usuario 	//User resp [sug. add, sug. mod, sug. del], bienes propios unic. No admin. (Doc, Aux no confianza)
				2	Usuario 	//User no resp de bienes. Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (SSO)
				3	Usuario 	//User resp de bienes y Admin bás. [sug. add, sug. mod, sug. del], todos los bienes. (Docente apoyo inventario)
				4	Usuario 	//User resp de bienes y Admin avdc. [add, mod, del], todos los bienes.(Coord., Secret., Aux. de Confianza)
				5	Usuario 	//Usuario SuperAdministrador Frontend (Rector)	
				6	Usuario 	//Usuario SuperAdministrador Frontend y Backend (Desarrollador) 
		*/
		array(105254000013,"SvS1234*","IE Entrerríos","ieerectoria2021@gmail.com",1,6),
		array(205034000248,"SvS1234*","IE Tapartó","ieerectoria2021@gmail.com",1,1)
		);	
	foreach ($usuarios as $usuario){
		$sql='INSERT INTO '.$tabla.' (usuario, contrasena, nombres, apellidos, correo, usuarioCED, defUsuario, permiso) 
			VALUES ("'.$usuario[0].'","'.$usuario[1].'","'.$usuario[2].'","'.$usuario[3].'","'.$usuario[4].'",'.$usuario[5].','.$usuario[6].','.$usuario[7].')';
			insertar();		
	}


    //Cerrar
	mysqli_close($cnx);	
	echo "<div> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='index.php'>Volver</a> </div>";
?>
	</body>
</html>