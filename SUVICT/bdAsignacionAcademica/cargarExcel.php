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
		$nombreArchivo='bdAsignacionAcademica/asignacionAcademica.xlsx'; //Variable con el nombre del archivo
	}else{//viene desde "cargar excel", dentro de la aplicacion.		
        require "../vendor/autoload.php"; //Agregamos la librería 
	    include('../conexion/datosConexion.php');//Agregamos la conexión
	    include('../mayIni.php');
        $nombreArchivo='../bdAsignacionAcademica/asignacionAcademica.xlsx';
	}
	$objPHPExcel = IOFactory::load($nombreArchivo);	// Cargo la hoja de cálculo
	$objPHPExcel->setActiveSheetIndex(0); //Asigno la hoja de calculo activa
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); //Obtengo el numero de filas del archivo
	//Borrar los registros actuales.
	mysqli_query($conexion,"SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($conexion,"TRUNCATE TABLE asignacionAcademica");	

	echo '<table border=1>
			<tr>
				<td>cod</td>
				<td>docente</td>
				<td>asignatura</td>
				<td>grupo</td>
			</tr>';
	echo $numRows.' ||<br>';
	$MALOS=0;
	for ($i=2;$i<=$numRows;$i++) {
		$docente = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$asignatura = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$grupo = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();		
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$docente.'</td>';
		echo '<td>'.$asignatura.'</td>';
		echo '<td>'.$grupo.'</td>';
		echo '</tr>';			
		$sql='INSERT INTO asignacionAcademica(docente,asignatura,grupo) 
		VALUES ('.$docente.','.$asignatura.','.$grupo.')';
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