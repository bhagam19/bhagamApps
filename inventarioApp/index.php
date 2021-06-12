<?php
    session_name("inventarioIEE");
    session_start();
?>
<!--
<html>
	<head>
	    <link rel="shortcut icon" href="../art/favicon32.ico"/>
	</head>
	
	<body>
	
	<H1>PROYECTOS</H1>

	<div> <a href='index.php'>Volver</a> || <a href='02-mostrarTablasenBD.php'>Mostrar Base de Datos</a> <br><br></div>
-->
<?php
	//### 1. Realizamos la conexion al servidor y a la base de datos a traves del archivo 'datosConexion.php'
	include('conexion/datosConexion.php');

 	//Verificamos si existe la tabla "instalacion" y el campo "confirmacion" con valor "1"  
    $sql=mysqli_query($conexion,"SELECT * FROM instalacion WHERE confirmacion=1");
    $row = mysqli_num_rows($sql); //Verificamos cuántas filas cumplen con la consulta "$sql"
        
    if(!$sql){//Si la consulta no se efectua, es porque no existe la tabla "instalacion", entonces se procede con la instalación de las tablas.
        echo "
            <html>
                <head>
                    <meta HTTP-equiv='REFRESH' content='0;url=01-instalacion.php'>
                </head>
            </html>";       
    }else if($row==1){ //Si se efectua la consulta "$sql", se confirma que apc_exists(keys)te el campo "confirmacion" con valor "1".
        
    	//Y se ejecuta la aplicación normalmente.Es decir, se ejecuta el archivo "principal.php"	
    	
    		echo 
    			"<html>
    				<head>
    					<meta HTTP-equiv='REFRESH' content='0;url=principal/00-principal.php'>
    				</head>
    			</html>";    
		     
    	//O, durante la etapa de creación, borramos las tablas, para reiniciar la BD.
        
       /* echo "
            <html>
                <head>
                    <meta HTTP-equiv='REFRESH' content='0;url=borrarTablas.php'>
                </head>
            </html>";  
        */
    }  
   
?>
<!--
	</body>
</html>
-->