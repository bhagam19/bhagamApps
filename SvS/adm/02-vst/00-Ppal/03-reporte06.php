<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión    
    echo'Estudiantes con estrategia PAE en SIMAT por grupo.<br><br>';
    $grupos=$cnx->query('SELECT DISTINCT grupo FROM simat WHERE estado="MATRICULADO" AND estrategiaPAE=1 ORDER BY grupo ASC');
    while ($fila=mysqli_fetch_array($grupos)){
        $estPAE=$cnx->query('SELECT numDoc FROM simat WHERE estado="MATRICULADO" AND estrategiaPAE=1 AND grupo ="'.$fila['grupo'].'"');  
        $est=$cnx->query('SELECT numDoc FROM simat WHERE estado="MATRICULADO" AND grupo ="'.$fila['grupo'].'"');       
        $cntPAE=mysqli_num_rows($estPAE);
        $cntEst=mysqli_num_rows($est);
        echo $fila['grupo']."= ".$cntPAE." / ".$cntEst." = ".($cntEst-$cntPAE)."<br>";
    }
    echo "<br>";
    $MALOS=0;
    $cnt=1;
    $file = fopen('../../archivos/estPAE.csv',"r");
    while(($col=fgetcsv($file,10000,";")) !== FALSE){
        if ($cnt>1){
            $numDOC=$col[21];
            $consulta=mysqli_query($cnx,"SELECT * FROM simat WHERE numDoc='".$numDOC."'");
            $row = mysqli_num_rows($consulta);
            if(!$row){                
                $MALOS++;
                echo $MALOS." - ". $numDOC.": NO SE ENCUENTRA.<br>";
            }          	
        }        	
        $cnt++;
    }
	if($MALOS==0){
		echo "No hay estudiantes con estrategia PAE en SIMAT que estén en otras IE.<br>";
	}else{
		echo "Hay ".$MALOS." Estudiantes con estrategia PAE en SIMAT que están en otras IE. <br><br>";		
	}
    echo "<br>";
    $consulta=$cnx->query('SELECT * FROM simat WHERE NOT estado="MATRICULADO" AND  estrategiaPAE=1 ORDER BY grupo ASC, apellidos ASC, nombres ASC');
    $cant=0;
    echo'Estudiantes con estrategia PAE en SIMAT diferentes a MATRICULADO';
    echo '
        <table class="tablaBD tablaBienes" border=1>
            <thead>
                <tr class="stickyHead1">
                    <th>GRUPO</th>
                    <th>ESTADO</th>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>TIPO DOC</th>
                    <th>DOCUMENTO</th>
			    </tr>
            </thead> 
    ';
    
    while ($fila=mysqli_fetch_array($consulta)){
        $cant++;
        echo '
            <tr>
                <td>'.$fila['grupo'].'</td>
                <td>'.$fila['estado'].'</td>
                <td>'.$fila['apellidos'].'</td>
                <td>'.$fila['nombres'].'</td>
                <td>'.$fila['tipoDoc'].'</td>
                <td>'.$fila['numDoc'].'</td>
            </tr>
        ';
    }
    echo "Total: ".$cant;
    echo'</table><br>';
    $consulta=$cnx->query('SELECT * FROM simat WHERE estado="MATRICULADO" AND  estrategiaPAE=1 ORDER BY grupo ASC, apellidos ASC, nombres ASC');
    $cant=0;
    echo'<br>Estudiantes con estrategia PAE en SIMAT con estado MATRICULADO';
    echo '
        <table class="tablaBD tablaBienes" border=1>
            <thead>
                <tr class="stickyHead1">
                    <th>GRUPO</th>
                    <th>ESTADO</th>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>TIPO DOC</th>
                    <th>DOCUMENTO</th>
			    </tr>
            </thead> 
    ';    
    while ($fila=mysqli_fetch_array($consulta)){
        $cant++;
        echo '
            <tr>
                <td>'.$fila['grupo'].'</td>
                <td>'.$fila['estado'].'</td>
                <td>'.$fila['apellidos'].'</td>
                <td>'.$fila['nombres'].'</td>
                <td>'.$fila['tipoDoc'].'</td>
                <td>'.$fila['numDoc'].'</td>
            </tr>
        ';
    }
    echo "Total: ".$cant;
    echo'</table><br>';
    
?>