<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'AnalisisPreguntas.csv';
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
    include('../01-mdl/cnx.php');//Agregamos la conexión    
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
	$MALOS=0;
    $cnt=1;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,",")) !== FALSE){	
        $cnt++;	
        if($cnt>1){
            $idPregunta = $col[0];
            $clave = $col[1];
            $grado = $col[2];
            $grupo = $col[3];
            $instrumento = $col[4];
            $cuadernillo = $col[5];
            $componente = $col[6];
            $competencia = $col[7];
            $afirmacion = $col[8];
            $evidencia = $col[9];
            $nivelDificultad = $col[10];	
            $respCorrectas = $col[11];	
            $omisiones = $col[12];
            $opcA = $col[13];
            $opcB = $col[14];
            $opcC = $col[15];
            $opcD = 0;
            $opcE = 0;
            $opcF = 0;
            $opcG = 0;
            $opcH = 0;
            echo '<td>'.$cnt.'</td>';
            echo '<td>'.$idPregunta.'</td>';
            echo '<td>'.$clave.'</td>';
            echo '<td>'.$grado.'</td>';
            echo '<td>'.$grupo.'</td>';
            echo '<td>'.$instrumento.'</td>';
            echo '<td>'.$cuadernillo.'</td>';
            echo '<td>'.$componente.'</td>';
            echo '<td>'.$afirmacion.'</td>';
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
                INSERT INTO analisisPreguntas(idPregunta,clave,grado,grupo,instrumento,cuadernillo,componente,afirmacion,competencia,evidencia,nivelDificultad,respCorrectas,omisiones,opcA,opcB,opcC,opcD,opcE,opcF,opcG,opcH) 
                VALUES ("'.$idPregunta.'","'.$clave.'","'.$grado.'","'.$grupo.'","'.$instrumento.'",'.$cuadernillo.',"'.$componente.'","'.$afirmacion.'","'.$competencia.'",
                "'.$evidencia.'","'.$nivelDificultad.'","'.$respCorrectas.'","'.$omisiones.'","'.$opcA.'","'.$opcB.'","'.$opcC.'",
                "'.$opcD.'","'.$opcE.'","'.$opcF.'","'.$opcG.'","'.$opcH.'")
            ';
            if(!mysqli_query($cnx,$sql)){
                echo "NO ".$cnt."<BR>";
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
    echo"
        <html>
            <head>
                <meta HTTP-equiv='REFRESH' content='0;url=../../'>
            </head>
        </html>
    ";
    
?>