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
            apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            tipoDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            numDoc varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaNacimiento date,
            telefono varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            eps varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            direccion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            pais varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            fechaEstado date,
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
            PRIMARY KEY(id)
        )
    ';
	//Ejecutar
	ejecutarConsulta();    
//Cerrar
	mysqli_close($cnx);	
	echo "<div> ===== INSTALACIÓN FINALIZADA =====<br><br> <a href='index.php'>Volver</a> </div>";
?>
	</body>
</html>