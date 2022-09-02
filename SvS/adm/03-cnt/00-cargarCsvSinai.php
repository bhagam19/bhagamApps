<?php
    //ini_set('error_prepend_string', '<pre style="white-space: pre-wrap;">');
    error_reporting(-1);
    session_name("SINSIMAT");
    session_start();   
    $id=$_SESSION['id'];  
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'sinai'.$_SESSION['usuario'].'.csv';
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
	$tabla="sinai";
    $condicion=' WHERE institucion='.$id;
    require('index.php');
    modeloController::borrarDatos($tabla,$condicion);    
    echo '
        <table border=1>
			<tr>
				<td>id</td>
                <td>institucion</td>
                <td>sede</td>
				<td>grupo</td>				
                <td>apellidos</td>
                <td>nombres</td>
                <td>tipoDoc</td>
                <td>numDoc</td>
                <td>estado</td>
                <td>fechaEstado</td>
                <td>fechaNacimiento</td>
                <td>telefono</td>
                <td>eps</td>    
                <td>direccion</td>
                <td>pais</td>                
			</tr>
    '; 
	$MALOS=0;
    $cnt=1;
    /*
    if (($file = fopen($nombreArchivo,"r")) !== FALSE) {
        while (($datos = fgetcsv($file)) !== FALSE) {
            $numero = count($datos);
            echo "<p> $numero campos en la línea $cnt: <br /></p>\n";
            $cnt++;
            for ($c=0; $c < $numero; $c++) {    
                echo $datos[$c] . "<br />\n";
            }
        }
        fclose($file);
    }
    */
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,",")) !== FALSE){   
        if($cnt>4){
            $institucion=$id;
            $sede=$col[1];
            $grupo=$col[7];
            $estado = $col[9];
            $fechaEstado =date("Y-m-d",(strtotime(str_replace("/","-",$col[10]))));
            $apellidos = $col[18];
            $nombres = $col[19];
            $tipoDoc = $col[21];
            $numDoc = trim($col[22]);
            $fechaNacimiento = date("Y-m-d",(strtotime(str_replace("/","-",$col[24]))));;
            $telefono = $col[31];
            $eps = $col[36];
            $direccion = $col[30];
            $pais = $col[49]; 
            /*
            echo '   
                    '.$cnt.' || '.$institucion.' || '.$sede.' || '.$grupo.' || '.$estado.' || '.$fechaEstado.' || '.
                    $apellidos.' || '.$nombres.' || '.$tipoDoc.' || '.$numDoc.' || '.$fechaNacimiento.' || '.$telefono.' || '.
                    $eps.' || '.$direccion.' || '.$pais.' <br> '.
            ';
            */
            echo '<tr>';
            echo '<td>'.($cnt+1).'</td>';
            echo '<td>'.$institucion.'</td>';
            echo '<td>'.$sede.'</td>';
            echo '<td>'.$grupo.'</td>';            
            echo '<td>'.$apellidos.'</td>';
            echo '<td>'.$nombres.'</td>';
            echo '<td>'.$tipoDoc.'</td>';
            echo '<td>'.$numDoc.'</td>';
            echo '<td>'.$estado.'</td>';
            echo '<td>'.$fechaEstado.'</td>';
            echo '<td>'.$fechaNacimiento.'</td>';
            echo '<td>'.$telefono.'</td>';
            echo '<td>'.$eps.'</td>';
            echo '<td>'.$direccion.'</td>';
            echo '<td>'.$pais.'</td>';
            echo '</tr>';  
                      
            $valores= $id.",'".$sede."','".$grupo."','".$apellidos."','".$nombres."','".$tipoDoc."','".$numDoc."','".$estado."','".$fechaEstado."','".
                    $fechaNacimiento."','".$telefono."','".$eps."','".$direccion."','".$pais."'";
            modeloController::insertarDatos($tabla,$valores);
            if(!$col[7]){
                echo "NO ".($cnt+1)."<BR>";
                $MALOS++;
            }
        }
        $cnt++;
    }    
	echo '</table>';
    modeloController::volverEnumerar($tabla);
	if($MALOS==0){
		echo "Se guardaron todos los registros de manera existosa!!!!";
	}else{
		echo "No se pudieron guardar ".$MALOS." registros!!!";		
	}    
    /*echo"
        <html>
            <head>
                <meta HTTP-equiv='REFRESH' content='0;url=../../'>
            </head>
        </html>
    ";    */
?>