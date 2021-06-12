<?php
	// ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	ini_set('max_execution_time', 0); // for infinite time of execution 

  $directorio = '../bdBienes/';
  $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
  move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
	
	if(@$instalacion==1){//viene del archivo instalacion.php
		include('mayIni.php');
		require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = 'bdBienes/inventario.xlsx'; //Variable con el nombre del archivo
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
	
	echo '<table border=1>
			<tr>
				<td>cod</td>
				<td>codCategoria</td>
				<td>nomBien</td>
				<td>detalleDelBien</td>
				<td>serieDelBien</td>
				<td>origenDelBien</td>
				<td>fechaAdquisicion</td>
				<td>precio</td>
				<td>cantBien</td>
				<td>codDependencias</td>
				<td>usuarioID</td>
				<td>codAlmacenamiento</td>
				<td>codEstado</td>
				<td>codMantenimiento</td>
				<td>observaciones</td>
			</tr>';

	echo $numRows.' ||<br>';
	$MALOS="";
	
	for ($i=2;$i<=$numRows-1;$i++) {
		$codCategoria="";
		$codCategoria = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		// echo $codCategoria.' ||<br>';
			$sql=mysqli_query($conexion,"SELECT * FROM clasesDeBienes WHERE codClase=".$codCategoria);
			while($fila=mysqli_fetch_array($sql)){
				$codCategoria=$fila['codClase'];
			}
		$nomBien = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$detalleDelBien = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$detalleDelBien = str_replace("'", "\'", $detalleDelBien);//cambia (') por (\') para evitar el conflicto de comillas.

		$serieDelBien = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
			if($serieDelBien==""){
				$serieDelBien=0;
			}
		$origenDelBien = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
			if($origenDelBien==""){
				$origenDelBien="-";
			}
		$fechaAdquisicion = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
			if($fechaAdquisicion!=""){
				$fechaAdquisicion = date("Y-m-d",PHPExcel_Shared_Date::ExcelToPHP($fechaAdquisicion));
			}else{
				$fechaAdquisicion = "1990-01-01";
			}			
		$precio = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();	
			if($precio==""){
				$precio=0;
			}
		$precio = preg_replace('/\D/', '',$precio); //Quita todos los caracteres no numéricos.
		// echo $precio."<BR>";

		$cantBien = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
			if($cantBien==""){
				$cantBien=0;
			}
		$codDependencias = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
			$sql1=mysqli_query($conexion,'SELECT * FROM dependencias WHERE nomDependencias="'.$codDependencias.'"');
			while($fila=mysqli_fetch_array($sql1)){
				$codDependencias=$fila['codDependencias'];
			}
			if($codDependencias==""){
				$codDependencias="-";
			}
		$usuarioID = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
			$sql=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuarioCED=".$usuarioID);

			/*if(!$sql){
				echo "Esta es la fila con problemas en la 95: [".$i."] Y tiene usuarioID: {".$usuarioID."} || <br>";
			}*/
			while($fila=mysqli_fetch_array($sql)){
				$usuarioID=$fila['usuarioID'];
			}
			if($usuarioID==""){
				$usuarioID=0;
			}
		$codAlmacenamiento = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
			$sql=mysqli_query($conexion,'SELECT * FROM almacenamiento WHERE nomAlmacenamiento="'.$codAlmacenamiento.'"');
			while($fila=mysqli_fetch_array($sql)){
				$codAlmacenamiento=$fila['codAlmacenamiento'];
			}
			if($codAlmacenamiento==""){
				$codAlmacenamiento=0;
			}
		$codEstado = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
			$sql=mysqli_query($conexion,'SELECT * FROM estadoDelBien WHERE nomEstado="'.$codEstado.'"');
			while($fila=mysqli_fetch_array($sql)){
				$codEstado=$fila['codEstado'];
			}
			if($codEstado==""){
				$codEstado=0;
			}
		$codMantenimiento = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
			$sql=mysqli_query($conexion,'SELECT * FROM mantenimiento WHERE nomMantenimiento="'.$codMantenimiento.'"');
			while($fila=mysqli_fetch_array($sql)){
				$codMantenimiento=$fila['codMantenimiento'];
			}
			if($codMantenimiento==""){
				$codMantenimiento=0;
			}
		$observaciones = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
				
		$nomBien=mayIni($nomBien);
		$detalleDelBien=mayIni($detalleDelBien);
		
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$codCategoria.'</td>';
		echo '<td>'.$nomBien.'</td>';
		echo '<td>'.$detalleDelBien.'</td>';
		echo '<td>'.$serieDelBien.'</td>';
		echo '<td>'.$origenDelBien.'</td>';
		echo '<td>'.$fechaAdquisicion.'</td>';
		echo '<td>'.$precio.'</td>';
		echo '<td>'.$cantBien.'</td>';
		echo '<td>'.$codDependencias.'</td>';
		echo '<td>'.$usuarioID.'</td>';
		echo '<td>'.$codAlmacenamiento.'</td>';	
		echo '<td>'.$codEstado.'</td>';
		echo '<td>'.$codMantenimiento.'</td>';
		echo '<td>'.$observaciones.'</td>';
		echo '</tr>';
			
		$sql='INSERT INTO bienes (nomBien, detalleDelBien, serieDelBien, origenDelBien, fechaAdquisicion, precio, cantBien,codCategoria,codDependencias,usuarioID,codAlmacenamiento,codEstado,codMantenimiento,observaciones) 
		VALUES (\''.$nomBien.'\',\''.$detalleDelBien.'\',\''.$serieDelBien.'\',\''.$origenDelBien.'\',\''.$fechaAdquisicion.'\','.$precio.','.$cantBien.','.$codCategoria.','.$codDependencias.','.$usuarioID.','.$codAlmacenamiento.','.$codEstado.','.$codMantenimiento.',\''.$observaciones.'\')';
		
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