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
//########## CREAR UNA TABLA DE "analisisPreguntas" ##########
	// Preparamos la consulta SQL
	$tabla = 'analisisPreguntas';
	$sql='
        CREATE TABLE IF NOT EXISTS '.$tabla.' (
            id int(4) NOT NULL AUTO_INCREMENT,
            idPregunta varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            clave varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            grado varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            grupo varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            instrumento varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            cuadernillo int(2) NOT NULL,
            componente varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            competencia varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            afirmacion varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            evidencia varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            nivelDificultad varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            respCorrectas varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            omisiones varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcA varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcB varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcC varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcD varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcE varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcF varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcG varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            opcH varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            PRIMARY KEY(id)
        )
    ';
	//Ejecutar
	ejecutarConsulta();    
//########## CREAR UNA TABLA DE "analisisAreas" ##########
	// Preparamos la consulta SQL
	$tabla = 'analisisAreas';
	$sql='
        CREATE TABLE IF NOT EXISTS '.$tabla.' (
            id int(4) NOT NULL AUTO_INCREMENT,
            idEstudiante varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estudiante varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            grado varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            grupo varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            instrumento varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            cuadernillo int(2) NOT NULL,
            ttlRespCorrectas int(2) NOT NULL,
            respCorrectas float(6),
            omisiones float(6),
            fecha date,
            modalidad varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            PRIMARY KEY(id)
        )
    ';
	//Ejecutar
	ejecutarConsulta();
//########## CREAR UNA TABLA DE "analisisEstudiantes" ##########
	// Preparamos la consulta SQL
	$tabla = 'analisisEstudiantes';
	$sql='
        CREATE TABLE IF NOT EXISTS '.$tabla.' (
            id int(4) NOT NULL AUTO_INCREMENT,
            idEstudiante varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            estudiante varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            grado varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            grupo varchar(4) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            instrumento varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            cuadernillo int(2) NOT NULL,
            idPregunta varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            clave varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            respEstudiante varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
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