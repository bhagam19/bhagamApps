<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'analisisAreas.csv';
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
	mysqli_query($cnx,"TRUNCATE TABLE analisisAreas");
    echo '<table border=1>
			<tr>
				<td>id</td>
				<td>instrumento</td>
				<td>cuadernillo</td>
                <td>grado</td>
                <td>grupo</td>
                <td>idEstudiante</td>
                <td>estudiante</td>
                <td>ttlRespCorrectas</td>
                <td>porcRespCorrectas</td>
                <td>omisiones</td>
                <td>fecha</td>
                <td>Modalidad</td>
			</tr>';
	$MALOS=0;
    $cnt=0;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,",")) !== FALSE){	
        $cnt++;	
        if($cnt>1){
            $instrumento = $col[0];
            $cuadernillo = $col[1];
            $grado = $col[2];
            $grupo = $col[3];            
            $idEstudiante = $col[4];
            $estudiante = $col[5];
            if(is_numeric($col[6])){
                $ttlRespCorrectas = $col[6];
            }else{
                $ttlRespCorrectas = 0;
            }      
            $respCorrectas = $col[7];
            $omisiones = $col[8];
            $fecha = $col[9];	
            $modalidad = $col[10];	
            
            echo '<td>'.$cnt.'</td>';
            echo '<td>'.$instrumento.'</td>';
            echo '<td>'.$cuadernillo.'</td>';            
            echo '<td>'.$grado.'</td>';
            echo '<td>'.$grupo.'</td>';           
            echo '<td>'.$idEstudiante.'</td>';
            echo '<td>'.$estudiante.'</td>';
            echo '<td>'.$ttlRespCorrectas.'</td>';            
            echo '<td>'.$respCorrectas.'</td>';
            echo '<td>'.$omisiones.'</td>';
            echo '<td>'.$fecha.'</td>';
            echo '<td>'.$modalidad.'</td>';
            echo '</tr>';			
            $sql='
                INSERT INTO analisisAreas(instrumento,cuadernillo,grado,grupo,idEstudiante,estudiante,ttlRespCorrectas,respCorrectas,omisiones,fecha,modalidad) 
                VALUES ("'.$instrumento.'",'.$cuadernillo.',"'.$grado.'","'.$grupo.'","'.$idEstudiante.'","'.$estudiante.'",'.$ttlRespCorrectas.',"'.$respCorrectas.'","'.$omisiones.'",
                "'.$fecha.'","'.$modalidad.'")
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
    /*
    echo"
        <html>
            <head>
                <meta HTTP-equiv='REFRESH' content='0;url=../../'>
            </head>
        </html>
    ";
    */
?>