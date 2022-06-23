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
		$nombreArchivo='bdSugerencias/razones.xlsx'; //Variable con el nombre del archivo
	}else{//viene desde "cargar excel", dentro de la aplicacion.		
        require "../vendor/autoload.php"; //Agregamos la librería 
	    include('../conexion/datosConexion.php');//Agregamos la conexión
	    include('../mayIni.php');
        $nombreArchivo='../bdSugerencias/razones.xlsx';
	}
	$objPHPExcel = IOFactory::load($nombreArchivo);	// Cargo la hoja de cálculo
	$objPHPExcel->setActiveSheetIndex(1); //Asigno la hoja de calculo activa
	$numRows = $objPHPExcel->setActiveSheetIndex(1)->getHighestRow(); //Obtengo el numero de filas del archivo
	//Borrar los registros actuales.
	mysqli_query($conexion,"SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($conexion,"TRUNCATE TABLE subrazones");
		
	echo '<table border=1>
			<tr>
				<td>cod</td>
				<td>razon</td>
				<td>subrazon</td>
			</tr>';
	echo $numRows.' ||<br>';
	$MALOS=0;
	for ($i=1;$i<=$numRows;$i++) {
		$razon = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();	
		$subrazon = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();		
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$razon.'</td>';
		echo '<td>'.$subrazon.'</td>';
		echo '</tr>';
		$sql='INSERT INTO subrazones (idRazon,subrazon) 
		VALUES ('.$razon.',\''.$subrazon.'\')';
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