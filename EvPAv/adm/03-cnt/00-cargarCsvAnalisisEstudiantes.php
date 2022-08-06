<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'analisisEstudiantes.csv';
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
	mysqli_query($cnx,"TRUNCATE TABLE analisisEstudiantes");
    echo '<table border=1>
			<tr>
				<td>id</td>
				<td>idEstudiante</td>
				<td>estudiante</td>
                <td>grado</td>
                <td>grupo</td>
                <td>instrumento</td>
                <td>cuadernillo</td>
                <td>idPregunta</td>
                <td>clave</td>
                <td>respEstudiante</td>
			</tr>';
	$MALOS=0;
    $cnt=0;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,",")) !== FALSE){	
        $cnt++;	
        if($cnt>1){
            $idEstudiante = $col[0];
            $estudiante = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $col[1]);
            $grado = $col[2];
            $grupo = $col[3];            
            $instrumento = $col[4];
            if(is_numeric($col[5])){
                $cuadernillo = $col[5];
            }else{
                $cuadernillo = 0;
            }
            $idPregunta = $col[6];
            $clave = $col[7];
            $respEstudiante = $col[8];
            echo '<td>'.$cnt.'</td>';
            echo '<td>'.$idEstudiante.'</td>';  
            echo '<td>'.$estudiante.'</td>';
            echo '<td>'.$grado.'</td>';
            echo '<td>'.$grupo.'</td>';
            echo '<td>'.$instrumento.'</td>';
            echo '<td>'.$cuadernillo.'</td>';
            echo '<td>'.$idPregunta.'</td>';
            echo '<td>'.$clave.'</td>';
            echo '<td>'.$respEstudiante.'</td>';
            echo '</tr>';			
            $sql='
                INSERT INTO analisisEstudiantes(idEstudiante,estudiante,grado,grupo,instrumento,cuadernillo,idPregunta,clave,respEstudiante) 
                VALUES ("'.$idEstudiante.'","'.$estudiante.'","'.$grado.'","'.$grupo.'","'.$instrumento.'",'.$cuadernillo.',"'.$idPregunta.'",
                "'.$clave.'","'.$respEstudiante.'")
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