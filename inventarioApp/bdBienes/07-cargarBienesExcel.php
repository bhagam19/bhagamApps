<?php
  error_reporting(0);//Para que no muestre errores
	// ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	ini_set('max_execution_time', 0); // for infinite time of execution 
  
  //Subimos el archivo de excel al servidor
  $directorio = '../bdBienes/';
  $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
  move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);

	include('../mayIni.php');
  require '../Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
  include('../conexion/datosConexion.php');//Agregamos la conexión	

  $nombreArchivo = $subir_archivo; //Variable con el nombre del archivo	
	
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo); // Cargo la hoja de cálculo	
	$objPHPExcel->setActiveSheetIndex(0); //Asigno la hoja de calculo activa
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); //Obtengo el numero de filas del archivo
	
  //Borrar los registros actuales.
	mysqli_query($conexion, "SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($conexion,"TRUNCATE TABLE bienes");
	
	for ($i=2;$i<=$numRows-1;$i++) {		
    $codCategoria=1; // Por ahora, todo el inventario sera ingresado como tipo "Mueble"
		$nomBien = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();    
		$detalleDelBien = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$detalleDelBien = str_replace("'", "\'", $detalleDelBien);//cambia (') por (\') para evitar el conflicto de comillas.
    $serieDelBien=0;
		$origenDelBien="-";
    $fechaAdquisicion = "1990-01-01";
		$precio=0;    
		$cantBien = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
			if($cantBien==""){
				$cantBien=0;
			}
		$codDependencias = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			$sql1=mysqli_query($conexion,'SELECT codDependencias FROM dependencias WHERE nomDependencias="'.$codDependencias.'"');
			while($fila=mysqli_fetch_array($sql1)){
				$codDependencias=$fila['codDependencias'];
			}
			if($codDependencias==""){
				$codDependencias="-";
			}
    $sql=mysqli_query($conexion,"SELECT usuarioID FROM dependencias WHERE codDependencias=".$codDependencias);
    while($f=mysqli_fetch_array($sql)){
      $usuarioID=$f['usuarioID'];
    }
    if($usuarioID==""){
      $usuarioID=0;
    }
    $codAlmacenamiento=1;		
		$codEstado = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			$sql=mysqli_query($conexion,'SELECT codEstado FROM estadoDelBien WHERE nomEstado="'.$codEstado.'"');
			while($fila=mysqli_fetch_array($sql)){
				$codEstado=$fila['codEstado'];
			}
			if($codEstado==""){
				$codEstado=0;
			}
    $codMantenimiento=1;
		$observaciones = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		
    $nomBien=mayIni($nomBien);
		$detalleDelBien=mayIni($detalleDelBien);
					
		$sql='INSERT INTO bienes (nomBien, detalleDelBien, serieDelBien, origenDelBien, fechaAdquisicion, precio, cantBien,codCategoria,codDependencias,usuarioID,codAlmacenamiento,codEstado,codMantenimiento,observaciones) 
		VALUES (\''.$nomBien.'\',\''.$detalleDelBien.'\',\''.$serieDelBien.'\',\''.$origenDelBien.'\',\''.$fechaAdquisicion.'\','.$precio.','.$cantBien.','.$codCategoria.','.$codDependencias.','.$usuarioID.','.$codAlmacenamiento.','.$codEstado.','.$codMantenimiento.',\''.$observaciones.'\')';
		
    mysqli_query($conexion,$sql);		
	}
echo "
  <html>
    <head>
      <meta HTTP-equiv='REFRESH' content='0;url=../principal/00-principal.php'>
    </head>
  </html>
  ";   
	
?>