<?php

	error_reporting(0);
	/*
	$directorio = '../bdAsignaturas/';
	$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
	move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
	$nombreArchivo = $subir_archivo; //Variable con el nombre del archivo
	*/
	// ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	ini_set('max_execution_time', 0); // for infinite time of execution		
	use PhpOffice\PhpSpreadsheet\IOFactory;	
	if(@$instalacion==1){//viene del archivo instalacion.php
		//include('mayIni.php');
		require 'vendor/autoload.php'; //Agregamos la librería 
		include('conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo='bdNominaciones/condiciones.xlsx'; //Variable con el nombre del archivo
	}else{//viene desde "cargar excel", dentro de la aplicacion.		
		require "../vendor/autoload.php"; //Agregamos la librería 
		include('../conexion/datosConexion.php');//Agregamos la conexión
		include('../mayIni.php');
		$nombreArchivo='../bdNominaciones/condiciones.xlsx';
	}
	$objPHPExcel = IOFactory::load($nombreArchivo);	// Cargo la hoja de cálculo
	$objPHPExcel->setActiveSheetIndex(0); //Asigno la hoja de calculo activa
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); //Obtengo el numero de filas del archivo
	//Borrar los registros actuales.
	mysqli_query($conexion,"SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($conexion,"TRUNCATE TABLE condiciones");	
	
	echo '<table border=1>
			<tr>
				<td>cod</td>
				<td>area</td>
				<td>condicion</td>
				<td>descripcion</td>
			</tr>';
	echo $numRows.' ||<br>';
	$MALOS=0;
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