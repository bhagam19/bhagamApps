<?php
    error_reporting(0);
    $directorio = '../bdDependencias/';
    $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
    move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
    
	// ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	ini_set('max_execution_time', 0); // for infinite time of execution 

	if(@$instalacion==1){//viene del archivo instalacion.php
		include('mayIni.php');
		require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = $subir_archivo; //Variable con el nombre del archivo
	}else{//viene desde "cargar excel", dentro de la aplicacion.
		include('../mayIni.php');
		require '../Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('../conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = $subir_archivo; //Variable con el nombre del archivo	
	}
	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	//Borrar los registros actuales.
	mysqli_query($conexion, "SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($conexion,"TRUNCATE TABLE dependencias");
	
	for ($i=2;$i<=$numRows;$i++) {
		
		$dependencia = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		//echo $dependencia." // ";
		$ubicacion = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		switch($ubicacion){
		    case "Salón":
		        $ubicacion=1;
		        break;
		    case "Oficina":
		        $ubicacion=2;
		        break;
		    case "Departamento":
		        $ubicacion=3;
		        break;
		    case "Otro Lugar":
		        $ubicacion=4;
		        break;
		}
		//echo $ubicacion." // ";
		$responsable = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		
		if($responsable==""){
		    $responsable=54;
		}else{
		    $sql=mysqli_query($conexion,"SELECT usuarioID FROM usuarios WHERE usuarioCED=".$responsable);
			while($f=mysqli_fetch_array($sql)){
				$responsable=$f['usuarioID'];
			}
		}
		
		//echo $responsable."<br>";
		
		$sql='	INSERT INTO dependencias (nomDependencias, codUbicacion, usuarioID) 
				VALUES (\''.$dependencia.'\','.$ubicacion.','.$responsable.')';
	
	    mysqli_query($conexion,$sql);
	    
	}
	
	header('Location:' . getenv('HTTP_REFERER'));
?>