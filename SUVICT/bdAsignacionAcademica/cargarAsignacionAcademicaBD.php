<?php
	// session_name("CTEApp");
 //    session_start();
    include('../conexion/datosConexion.php');
	$sql=mysqli_query($conexion,'TRUNCATE asignacionAcademica');
   	include('../bdAsignacionAcademica/cargarExcel.php');
   	// echo include('../bdAsignacionAcademica/01-bdAsignacionAcademica.php');
 //Cerrar
	mysqli_close($conexion);
?>