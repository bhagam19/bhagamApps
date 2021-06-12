<?php
	include('../conexion/datosConexion.php');
	
	session_start();

	//Obtener variables.
	$clase=$_REQUEST['clase'];
	$categoria=$_REQUEST['categoria'];
	
	$tabla='categoriasDeBienes';
	$sql=mysqli_query($conexion,"SELECT * FROM ".$tabla);
	$contador=0;
	while($fila=mysqli_fetch_array($sql)){
		if($fila['codClase']==$clase&&$fila['nomCategoria']==$categoria){
			$contador++;
		}
	}
	
	if($contador==0){
		mysqli_query($conexion,"INSERT INTO ".$tabla." (codClase,nomCategoria) VALUES ('$clase','$categoria')");
		echo "si";
	}else{	
		echo "no";
	}
	mysqli_close($conexion);
?>