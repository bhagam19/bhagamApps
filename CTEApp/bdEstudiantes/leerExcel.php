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
		include('mayIni.php');
		require 'Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = 'bdEstudiantes/estudiantes.xlsx'; //Variable con el nombre del archivo
	}else{//viene desde "cargar excel", dentro de la aplicacion.
		// include('../mayIni.php');
		// require '../Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
		include('../conexion/datosConexion.php');//Agregamos la conexión	
		$nombreArchivo = '../bdEstudiantes/estudiantes.xlsx'; //Variable con el nombre del archivo	
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
				<td>ID</td>
				<td>apellidos</td>
				<td>nombres</td>
				<td>genero</td>
				<td>sede</td>
				<td>grupo</td>
			</tr>';
	echo $numRows.' ||<br>';
	$MALOS="";
	for ($i=5;$i<=$numRows-1;$i++) {

		$estado = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
		if($estado=="MATRICULADO"){
			$id = $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
			$apellidos = $objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
			$nombres = $objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
			$genero = $objPHPExcel->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue();
			$sede = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
				switch ($sede) {					
					case 'JULIO JIMÉNEZ':
						$sede=1;
						break;
					case 'LA LEJÍA':
						$sede=2;
						break;
					case 'LA MELLIZA':
						$sede=3;
						break;
					case 'MONTEVERDE':
						$sede=4;
						break;
					case 'RICARDO GONZÁLEZ':
						$sede=5;
						break;	
					case 'PRINCIPAL':
						$sede=6;
						break;				
				}

			$grupo = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();

			echo $grupo." || ";

			$sql=mysqli_query($conexion,"SELECT * FROM grupos");
			while($fila=mysqli_fetch_array($sql)){
				if($fila['grupo']==$grupo){
					$grupo=$fila['cod'];
				}
			}

			echo $grupo." || <br>";
							
			$apellidos=mayIni($apellidos);
			$nombres=mayIni($nombres);
			
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$id.'</td>';
			echo '<td>'.$apellidos.'</td>';
			echo '<td>'.$nombres.'</td>';
			echo '<td>'.$genero.'</td>';			
			if($genero=='F'){
				$genero=0;
			}else{
				$genero=1;
			}
			echo '<td>'.$sede.'</td>';
			echo '<td>'.$grupo.'</td>';
			echo '</tr>';
				
			$sql='INSERT INTO estudiantes (ID, apellidos, nombres, genero, sede, grupo) 
			VALUES (\''.$id.'\',\''.$apellidos.'\',\''.$nombres.'\','.$genero.','.$sede.','.$grupo.')';

			if(!mysqli_query($conexion,$sql)){
			echo "NO ".$i."<BR>";
			$MALOS++;
		}
						
		}
		
	}

	echo '</table>';

	if($MALOS==0){
		echo "Se guardaron todos los registros de manera existosa!!!!";
	}else{
		echo "No se pudieron guardar ".$MALOS." registros!!!";		
	}
	
?>