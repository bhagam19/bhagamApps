<?php
    error_reporting(0);    
	$directorio = '../archivos/';
	$subir_archivo = $directorio.'sinai.csv';    
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
    $tabla="sinai";
	mysqli_query($cnx,"SET FOREIGN_KEY_CHECKS=0");
	mysqli_query($cnx,"TRUNCATE TABLE ".$tabla);    
    echo '
        <table border=1>
			<tr>
				<td>id</td>
				<td>grupo</td>
				<td>estado</td>
                <td>fechaEstado</td>
                <td>apellidos</td>
                <td>nombres</td>
                <td>tipoDoc</td>
                <td>numDoc</td>
                <td>fechaNacimiento</td>
                <td>telefono</td>
                <td>eps</td>
                <td>direccion</td>
                <td>pais</td>                
			</tr>
    ';	
	$MALOS=0;
    $cnt=1;
    $file = fopen($nombreArchivo,"r");
    while(($col=fgetcsv($file,10000,",")) !== FALSE){
        if($cnt>4){
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
            echo '<tr>';
            echo '<td>'.$cnt.'</td>';
            echo '<td>'.$grupo.'</td>';
            echo '<td>'.$estado.'</td>';
            echo '<td>'.$fechaEstado.'</td>';
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
                INSERT INTO '.$tabla.'(grupo,estado,fechaEstado,apellidos,nombres,tipoDoc,numDoc,fechaNacimiento,telefono,eps,direccion,pais) 
                VALUES ("'.$grupo.'","'.$estado.'","'.$fechaEstado.'","'.$apellidos.'","'.$nombres.'","'.$tipoDoc.'","'.$numDoc.'","'.$fechaNacimiento.'","'.$telefono.'","'.$eps.'","'.$direccion.'","'.$pais.'")
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