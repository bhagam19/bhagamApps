<?php
	// ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	ini_set('max_execution_time', 0); // for infinite time of execution 

	/*$directorio = opendir("../bdBienes/"); //ruta actual
	while ($archivo = readdir($directorio)){//obtenemos un archivo y luego otro sucesivamente	
	    if (is_dir($archivo)){//verificamos si es o no un directorio	    
	        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
	    }else{	
	        echo $archivo . "<br />";
	    }
	}*/	
	
	if(@$instalacion==1){//viene del archivo instalacion.php
		//require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = 'bdNominaciones/condiciones.xlsx'; //Variable con el nombre del archivo
	}else{//viene desde "cargar excel", dentro de la aplicacion.
		// require '../Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('../conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = '../bdNominaciones/condiciones.xlsx'; //Variable con el nombre del archivo	
	}	
	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	echo '<table border=1>
			<tr>
				<td>cod</td>
				<td>area</td>
				<td>condicion</td>
				<td>descripcion</td>
			</tr>';
	echo $numRows.' ||<br>';
	$MALOS="";
	for ($i=2;$i<=$numRows;$i++) {

		$area = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$condicion = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$descripcion = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();		

		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$area.'</td>';
		echo '<td>'.$condicion.'</td>';
		echo '<td>'.$descripcion.'</td>';
		echo '</tr>';
				
		$sql='INSERT INTO condiciones (codArea,tipoCondicion,descripcion) 
		VALUES ('.$area.','.$condicion.',\''.$descripcion.'\')';

		if(!mysqli_query($conexion,$sql)){
			echo "NO ".$i."<BR>";
			$MALOS++;
		}		
	}

	echo '</table>';

	if($MALOS==0){
		echo "Se guardaron todos los registros de manera existosa!!!!";
	}else{
		echo "No se pudieron guardar ".$MALOS." registros!!!";		
	}
	
?>