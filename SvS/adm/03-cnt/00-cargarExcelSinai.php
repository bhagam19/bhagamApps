<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'sinai.xlsx';    
    move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
    $nombreArchivo = $subir_archivo; //Variable con el nombre del archivo    
    echo $nombreArchivo."<br>";    
    if (is_uploaded_file($_FILES['subir_archivo']['tmp_name'])) {
        echo "Archivo ". $_FILES['subir_archivo']['name'] ." subido con éxtio.\n";
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
	$objPHPExcel->setActiveSheetIndex(0); //Asigno la hoja de calculo activa
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); //Obtengo el numero de filas del archivo
    
	//Borrar los registros actuales.
	mysqli_query($cnx,"SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($cnx,"TRUNCATE TABLE sinai");	
    echo '
        <table border=1>
			<tr>
				<td>id</td>
				<td>grupo</td>
				<td>estado</td>
                <td>apellidos</td>
                <td>nombres</td>
                <td>tipoDoc</td>
                <td>numDoc</td>
                <td>fechaNacimiento</td>
                <td>telefono</td>
                <td>eps</td>
                <td>direccion</td>
                <td>pais</td>
                <td>fechaEstado</td>
			</tr>
    ';
	echo $numRows.' ||<br>';
	$MALOS=0;
	for ($i=5;$i<=$numRows;$i++) {
		$grupo = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$estado = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
        $apellidos = $objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
        $nombres = $objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
        $tipoDoc = $objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
        $numDoc = $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
        $fechaNacimiento = $objPHPExcel->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue();
        $fechaNacimiento=date("Y-m-d",(($fechaNacimiento-25569)*86400));
        $telefono = $objPHPExcel->getActiveSheet()->getCell('AI'.$i)->getCalculatedValue();
        $eps = $objPHPExcel->getActiveSheet()->getCell('AN'.$i)->getCalculatedValue();
        $direccion = $objPHPExcel->getActiveSheet()->getCell('AH'.$i)->getCalculatedValue();
        $pais = $objPHPExcel->getActiveSheet()->getCell('BA'.$i)->getCalculatedValue();	
        $fechaEstado = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
        $fechaEstado=date("Y-m-d",(($fechaEstado-25569)*86400));
        
		echo '<tr>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$grupo.'</td>';
		echo '<td>'.$estado.'</td>';
        echo '<td>'.$apellidos.'</td>';
        echo '<td>'.$nombres.'</td>';
        echo '<td>'.$tipoDoc.'</td>';
        echo '<td>'.$numDoc.'</td>';
        echo '<td>'.$fechaNacimiento.'</td>';
        echo '<td>'.$telefono.'</td>';
        echo '<td>'.$eps.'</td>';
        echo '<td>'.$direccion.'</td>';
        echo '<td>'.$pais.'</td>';
        echo '<td>'.$fechaEstado.'</td>';
		echo '</tr>';		
        error_reporting(-1);  	
		$sql='
            INSERT INTO sinai(grupo,estado,apellidos,nombres,tipoDoc,numDoc,fechaNacimiento,telefono,eps,direccion,pais,fechaEstado) 
            VALUES ("'.$grupo.'","'.$estado.'","'.$apellidos.'","'.$nombres.'","'.$tipoDoc.'","'.$numDoc.'","'.$fechaNacimiento.'",
                        "'.$telefono.'","'.$eps.'","'.$direccion.'","'.$pais.'","'.$fechaEstado.'")
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