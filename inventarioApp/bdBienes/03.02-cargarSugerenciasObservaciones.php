<?php

	/*
	Para esta característica es necesario preparar:

	- El archivo 03.01-formularioCrearBienes.php 
		* En el elemento del formulario, agregar la accion onkeyup="sugerirObservaciones(this.value)"
		* Alistar, en la parte final del archivo, un div para los resultados de la consulta (Para este caso tenemos <div id="suggestions"></div> para todas las sugerencias)

	- El archivo 03.02...PHP que conecta a la BD y realiza la consulta.

	- El archivo 00-bienes.js que activa la acción.
		* Crear la función: function sugerirObservaciones(input){}
		* Agregar el id del elemento que recibe el resultado de la consulta. (En este caso: id="inputObserv")
		* Modificar los atributos "top" y "left" donde deben aparecer las sugerencias.


	*/
	
	include('../conexion/datosConexion.php'); // Realizamos la conexión a la BD

	$html = ''; // En esta variable guardaremos el resultado del código html
	$key = $_POST['key']; //En esta variable guardamos los caracteres o las palabras que escribimos en el cuadra de input.

	//Hacemos la consulta: seleccionamos los valores únicos del campo que requerimos en la tabla bienes.
	$result  = mysqli_query($conexion,"SELECT DISTINCT observaciones FROM bienes WHERE UPPER(observaciones) LIKE UPPER('%".$key."%')");
	$cnt=0;
	if ($result->num_rows > 0) {//Si la consulta arroja más de una línea (Es decir, si encuentra algún resultado)
	    while ($row = $result->fetch_assoc()) { //Guardamos el resultado en un arreglo.
	    	$cnt=$cnt++;
	    	//Y guardamos cada línea en un div.              
	        $html .= '<div><a class="suggest-element" data="'.$row['observaciones'].'" id="obs'.$cnt.'">'.$row['observaciones'].'</a></div>';
	    }
	}
	echo $html;
?>