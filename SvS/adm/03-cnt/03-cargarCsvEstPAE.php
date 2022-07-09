<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'estPAE.csv';    
    move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
    $nombreArchivo = $subir_archivo; //Variable con el nombre del archivo    
    echo $nombreArchivo."<br>";       
    echo "<br>";    	
	include('../01-mdl/cnx.php');//Agregamos la conexión    
	$MALOS=0;
    $cnt=1;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,";")) !== FALSE){
        if ($cnt>1){
            $numDOC=$col[9];	
            $sql='UPDATE simat SET estrategiaPAE=1 WHERE numDOC="'.$numDOC.'"';
            mysqli_query($cnx,$sql);
            $consulta=mysqli_query($cnx,"SELECT * FROM simat WHERE numDoc='".$numDOC."'");
            $row = mysqli_num_rows($consulta);
            if($row){                
                echo ($cnt-1)." - ". $numDOC.": ";
                while($fila=mysqli_fetch_array($consulta)){
                    echo $fila['grupo']." ".$fila['numDoc']." ".$fila['apellidos']." ".$fila['nombres']."<br>";
                }
            }else{
                $MALOS++;
                echo ($cnt-1)." - ". $numDOC.": NO SE ENCUENTRA.<br>";
            }          	
        }        	
        $cnt++;
    }
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