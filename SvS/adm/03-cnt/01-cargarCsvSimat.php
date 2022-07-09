<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'simat.csv';    
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
	mysqli_query($cnx,"TRUNCATE TABLE simat");	
    echo '<table border=1>
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
			</tr>';
	
	$MALOS=0;
    $cnt=1;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,";")) !== FALSE){
        if($cnt>1){
            $grupo=$col[14];
            switch($grupo){
                case '2301':
                    $grupo = 'C3-01';
                    break;
                case '2302':
                    $grupo = 'C3-02';
                    break;
                case '2401':
                    $grupo = 'C4-01';
                    break;
                case '2402':
                    $grupo = 'C4-02';
                    break;
                case '2501':
                    $grupo = 'C5-01';
                    break;
                case '2502':
                    $grupo = 'C5-02';
                    break;
                case '2601':
                    $grupo = 'C6-01';
                    break;
                case '2602':
                    $grupo = 'C6-02';
                    break;
                case '9901':
                    $grupo = '05-AC';
                    break;
                default:
                $grupo = substr($col[14],0,2)."-".substr($col[14],2,3);
            }
            $estado = $col[2];
            $apellidos = $col[25]." ".$col[26];
            $nombres = $col[27]." ".$col[28]; 
            $tipoDoc = substr($col[24],0,strpos($col[24],":"));
            $numDoc = $col[23];
            $fechaNacimiento = $col[30];
            $telefono = "";
            $eps = $col[32];
            $direccion = $col[31];
            $pais = $col[41];
            echo '<tr>';
            echo '<td>'.$cnt.'</td>';
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
            echo '</tr>';			
            $sql='
                INSERT INTO simat(grupo,estado,apellidos,nombres,tipoDoc,numDoc,fechaNacimiento,telefono,eps,direccion,pais) 
                VALUES ("'.$grupo.'","'.$estado.'","'.$apellidos.'","'.$nombres.'","'.$tipoDoc.'","'.$numDoc.'","'.$fechaNacimiento.'","'.$telefono.'","'.$eps.'","'.$direccion.'","'.$pais.'")
            ';
            if(!mysqli_query($cnx,$sql)){
                echo "NO ".$cnt."<BR>";
                $MALOS++;
            }
        }
        $cnt++;
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