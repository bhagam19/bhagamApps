<?php
    session_name("CTEApp");
    session_start();

	//### 1. Realizamos la conexion al servidor y a la base de datos a traves del archivo 'datosConexion.php'
	include('conexion/datosConexion.php');

 	//Verificamos si existe la tabla "instalacion" y el campo "confirmacion" con valor "1"  
    //$sql=mysqli_query($conexion,"SELECT * FROM instalacion WHERE confirmacion=1");
    $consulta=$conexion->query("SELECT * FROM instalacion WHERE confirmacion=1");
    $row = mysqli_num_rows($consulta); //Verificamos cuántas filas cumplen con la consulta "$sql"
            
    if(!$consulta){//Si la consulta no se efectua, es porque no existe la tabla "instalacion", entonces se procede con la instalación de las tablas.
        echo "
            <html>
                <head>
                    <meta HTTP-equiv='REFRESH' content='0;url=instalacion.php'>
                </head>
            </html>";       
    }else if($row==1){ //Si se efectua la consulta "$sql", se confirma que apc_exists(keys)te el campo "confirmacion" con valor "1".
        
    	//Y se ejecuta la aplicación normalmente.Es decir, se ejecuta el archivo "principal.php"	
    	
    		echo 
    			"<html>
    				<head>
    					<meta HTTP-equiv='REFRESH' content='0;url=principal/principal.php'>
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