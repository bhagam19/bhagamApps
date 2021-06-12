<html>
	<head>
		<link rel="stylesheet" type="text/css" href="conexion/conexion.css">
	</head>

	<body>
<?php
	include('conexion/datosConexion.php');

	function borrarTabla(){
		global $sql;
		global $conexion;	
		global $tabla;	
		if(mysqli_query($conexion,$sql)){
			echo "<div>===== BORRAR TABLA ".$tabla." =====<br><br></div>";
			echo "<div>Se borró la tabla exitosamente.<br><br></div>";			
		}else{
			echo "<div>===== BORRAR TABLA ".$tabla." =====<br><br></div>";
			echo "<div>No se pudo borrar la tabla. <span>".mysqli_error($conexion)."</span><br><br></div>";		
		}
	}	

	$resultado = mysqli_query ($conexion,'SHOW TABLES in '.$BD);
   	
   	$cont=0;
   	
   	while($fila=mysqli_fetch_row($resultado)){

   		mysqli_query($conexion,"DROP TABLE {$fila[0]}\n");

   	}

   	mysqli_free_result($resultado);

 //Cerrar
	mysqli_close($conexion);
	
	echo "
            <html>
                <head>
                    <meta HTTP-equiv='REFRESH' content='0;url=/inventarioApp/01-instalacion.php'>
                </head>
            </html>"; 

?>
 	</body>
 </html>