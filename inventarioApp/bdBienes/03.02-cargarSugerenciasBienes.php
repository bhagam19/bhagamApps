<?php
	
	include('../conexion/datosConexion.php');

	$html = '';
	$key = $_POST['key'];

	$result  = mysqli_query($conexion,"SELECT DISTINCT nomBien FROM bienes WHERE UPPER(nomBien) LIKE UPPER('%".$key."%') ORDER BY nomBien ASC");

	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {                
	        $html .= '<div><a class="suggest-element" data="'.$row['nomBien'].'" id="element'.$row['nomBien'].'">'.$row['nomBien'].'</a></div>';
	    }
	}
	echo $html;
?>