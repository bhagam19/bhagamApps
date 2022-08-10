<?php
    error_reporting(-1);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'simat.csv';    
    move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo);
    $nombreArchivo = $subir_archivo; //Variable con el nombre del archivo    
    echo $nombreArchivo."<br>";       
    echo "<br>";    	
	include('../01-mdl/cnx.php');//Agregamos la conexión    
	$MALOS=0;
    $cnt=1;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,";")) !== FALSE){
        $numDOC=$col[23];
        $estudiante = $col[27]." ".$col[28]." ".$col[25]." ".$col[26];
        $estudiante = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $estudiante);
		$sql='
            UPDATE analisisEstudiantes SET numDoc="'.$numDOC.'" WHERE estudiante="'.$estudiante.'"';

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