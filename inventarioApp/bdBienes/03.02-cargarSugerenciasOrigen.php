<?php
	
	include('../conexion/datosConexion.php');

	$html = '';
	$key = $_POST['key'];

	$result  = mysqli_query($conexion,"SELECT DISTINCT origenDelBien FROM bienes WHERE UPPER(origenDelBien) LIKE UPPER('%".$key."%')");

	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {                
	        $html .= '<div><a class="suggest-element" data="'.$row['origenDelBien'].'" id="element'.$row['origenDelBien'].'">'.$row['origenDelBien'].'</a></div>';
	    }
	}
	echo $html;
?>