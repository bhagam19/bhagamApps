<?php
	include('../conexion/datosConexion.php');
	$sql=mysqli_query($conexion,'TRUNCATE estudiantes');
   	include('../bdEstudiantes/leerExcel.php');
   	mysqli_close($conexion);
?>