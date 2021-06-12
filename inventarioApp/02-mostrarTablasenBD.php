<html>
	<head>
		<link rel="stylesheet" type="text/css" href="conexion/conexion.css">
	</head>

	<body>

<?php
	include('conexion/datosConexion.php');

	//echo "<div> <a href='../../index.php'>Volver a Inicio </a> <br><br></div>";
	echo "<div> <H1>===== BASE DE DATOS ===== </H1></div>";
	
	$resultado = mysqli_query ($conexion,'SHOW TABLES IN '.$BD);
   	
   	while($fila=mysqli_fetch_row($resultado)){

   		$resultado2=mysqli_query($conexion,"SHOW COLUMNS FROM {$fila[0]}\n");  		

   			echo 
			"
				<div>
					<br>
					<h2>Tabla {$fila[0]}\n:</h2>
					<table border='1'>
						<tr>					
			";	

		$cnt1=0;//Este contador nos establecera cuantos campos hay por tabla. Será muy útil para escribir los registros de cada tabla.	
   		while($fila2=mysqli_fetch_row($resultado2)){
   			echo "<th>{$fila2[0]}\n</th>"; //Escribimos los nombres de los campos
   			$cnt1++;
   		}
   			echo "</tr><tr>";
   		
   		$resultado3=mysqli_query($conexion,"SELECT * FROM {$fila[0]}\n");
   		while($fila3=mysqli_fetch_array($resultado3)){//$fila3 es un arreglo multidemensional que contiene arreglos con cada registro de cada tabla.
   			for($i=0;$i<=$cnt1-1;$i++){
   				echo "<td>".$fila3[$i]."</td>";	//Escribimos cada registro	
				}
			echo "</tr>";
   		}
   		
   			echo
   			"
   						</tr> 
   					</table>
				</div>
			";
   	}
   		mysqli_free_result($resultado2);
   	mysqli_free_result($resultado);

 //Cerrar
	mysqli_close($conexion);
	
	echo "<br><br><div>===== FINAL DE MOSTRAR TABLAS =====<br><br>";
?>

	</body>
</html>