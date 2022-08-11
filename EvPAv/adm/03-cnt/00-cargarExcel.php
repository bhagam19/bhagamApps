<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'EvPAv.xlsx';
    move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
    $nombreArchivo = $subir_archivo; //Variable con el nombre del archivo
    echo $nombreArchivo."<br>";
    if (is_uploaded_file($_FILES['subir_archivo']['tmp_name'])) {
        echo "Archivo ". $_FILES['subir_archivo']['name'] ." subido con éxito.\n";
     } else {
        echo "Posible ataque del archivo subido: ";
        echo "nombre del archivo: '". $_FILES['subir_archivo']['tmp_name'] . "'.";
     }
    
    echo "<br>";
	ini_set('max_execution_time', 0); // for infinite time of execution		
	use PhpOffice\PhpSpreadsheet\IOFactory;	
	require "vendor/autoload.php"; //Agregamos la librería 
	include('../01-mdl/cnx.php');//Agregamos la conexión
	$objPHPExcel = IOFactory::load($nombreArchivo);	// Cargo la hoja de cálculo
	$objPHPExcel->setActiveSheetIndex(1); //Asigno la hoja de calculo activa
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); //Obtengo el numero de filas del archivo
    
	//Borrar los registros actuales.
	mysqli_query($cnx,"SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($cnx,"TRUNCATE TABLE analisisPreguntas");
    echo '<table border=1>
			<tr>
				<td>id</td>
				<td>idPregunta</td>
				<td>clave</td>
                <td>grado</td>
                <td>grupo</td>
                <td>instrumento</td>
                <td>cuadernillo</td>
                <td>componente</td>
                <td>competencia</td>
                <td>afirmacion</td>
                <td>evidencia</td>
                <td>nivelDificultad</td>
                <td>respCorrectas</td>
                <td>omisiones</td>
                <td>opcA</td>
                <td>opcB</td>
                <td>opcC</td>
                <td>opcD</td>
                <td>opcE</td>
                <td>opcF</td>
                <td>opcG</td>
                <td>opcH</td>
			</tr>';
	echo $numRows.' ||<br>';
	$MALOS=0;
	for ($i=3;$i<=$numRows;$i++) {
		$idPregunta = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$clave = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
        $grado = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $grupo = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
        $instrumento = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $cuadernillo = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
        $componente = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
        $competencia = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
        $afirmacion = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
        $evidencia = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
        $nivelDificultad = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();	
        $respCorrectas = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();	
        $omisiones = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();	
        $opcA = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();	
        $opcB = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();	
        $opcC = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();	
        $opcD = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();	
        $opcE = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();	
        $opcF = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();	
        $opcG = $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();	
        $opcH = $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();		
        echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$idPregunta.'</td>';
		echo '<td>'.$clave.'</td>';
        echo '<td>'.$grado.'</td>';
        echo '<td>'.$grupo.'</td>';
        echo '<td>'.$instrumento.'</td>';
        echo '<td>'.$cuadernillo.'</td>';
        echo '<td>'.$componente.'</td>';
        echo '<td>'.$competencia.'</td>';
        echo '<td>'.$evidencia.'</td>';
        echo '<td>'.$nivelDificultad.'</td>';
        echo '<td>'.$respCorrectas.'</td>';
        echo '<td>'.$omisiones.'</td>';
        echo '<td>'.$opcA.'</td>';
        echo '<td>'.$opcB.'</td>';
        echo '<td>'.$opcC.'</td>';
        echo '<td>'.$opcD.'</td>';
        echo '<td>'.$opcE.'</td>';
        echo '<td>'.$opcF.'</td>';
        echo '<td>'.$opcG.'</td>';
        echo '<td>'.$opcH.'</td>';
		echo '</tr>';			
		$sql='
            INSERT INTO analisisPreguntas(idPregunta,clave,grado,grupo,instrumento,cuadernillo,componente,evidencia,nivelDificultad,respCorrectas,omisiones,opcA,opcB,opcC,
            ,opcD,opcE,opcF,opcG,opcH) 
            VALUES ("'.$idPregunta.'","'.$clave.'","'.$grado.'","'.$grupo.'","'.$instrumento.'",'.$cuadernillo.',"'.$componente.'","'.$evidencia.'","'.$nivelDificultad.'",
            '.$respCorrectas.','.$omisiones.','.$opcA.','.$opcB.','.$opcC.','.$opcD.','.$opcE.','.$opcF.','.$opcG.','.$opcG.')
        ';
		if(!mysqli_query($cnx,$sql)){
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
    echo"
        <html>
            <head>
                <meta HTTP-equiv='REFRESH' content='0;url=../../'>
            </head>
        </html>
    ";
    
?>