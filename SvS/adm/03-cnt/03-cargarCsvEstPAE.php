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
    $sql='UPDATE simat SET estrategiaPAE=0';
    mysqli_query($cnx,$sql);
    while(($col=fgetcsv($file,10000,";")) !== FALSE){
        if ($cnt>1){
            $numDOC=$col[21];
            $finEstrategia=$col[26];            
            if($finEstrategia===""){
                $sql='UPDATE simat SET estrategiaPAE=1 WHERE numDOC="'.$numDOC.'"';
                if(mysqli_query($cnx,$sql)){
                    echo ($cnt-1)." - ". $numDOC.": CON ESTRATEGIA.<br>";
                }else{
                    $MALOS++;
                }                
            }else{
                echo ($cnt-1).' - Sin estrategia: '.$numDOC=$col[21]." - ".$finEstrategia.'<br>';
            }                        	
        }        	
        $cnt++;
    }
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