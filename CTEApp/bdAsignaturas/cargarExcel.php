<?php
	ini_set('max_execution_time', 0); // for infinite time of execution	
	if(@$instalacion==1){//viene del archivo instalacion.php
		include('mayIni.php');
		require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = 'bdAsignaturas/Asignaturas.xlsx'; //Variable con el nombre del archivo
	}else{//viene desde "cargar excel", dentro de la aplicacion.
		include('../mayIni.php');
		require '../Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('../conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = '../bdAsignaturas/Asignaturas.xlsx'; //Variable con el nombre del archivo	
	}	
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);// Cargo la hoja de cálculo	
	$objPHPExcel->setActiveSheetIndex(0);//Asigno la hoja de calculo activa	
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();//Obtengo el numero de filas del archivo	
	echo '<table border=1>
			<tr>
				<td>cod</td>
				<td>asignatura</td>
				<td>codArea</td>
			</tr>';
	echo $numRows.' ||<br>';
	$MALOS="";
	for ($i=2;$i<=$numRows;$i++) {
		$asignatura = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$area = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();		
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$asignatura.'</td>';
		echo '<td>'.$area.'</td>';
		echo '</tr>';			
		$sql='INSERT INTO asignaturas(asignatura,codArea) VALUES ("'.$asignatura.'",'.$area.')';
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