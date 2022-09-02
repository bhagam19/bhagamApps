<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'Anexo6AFUC.csv';    
    move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
    $nombreArchivo = $subir_archivo; //Variable con el nombre del archivo    
    echo $nombreArchivo."<br>";       
    echo "<br>";    	
	include('../01-mdl/cnx.php');//Agregamos la conexión    
	$MALOS=0;
    $cnt=1;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,";")) !== FALSE){
        $numDOC=$col[6];
        $telefono =$col[14];	
		$sql='
            UPDATE simat SET telefono="'.$telefono.'" WHERE numDOC="'.$numDOC.'"';

		if(!mysqli_query($cnx,$sql)){
			echo "NO ".$cnt."<BR>";
			$MALOS++;
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