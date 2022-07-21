<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    echo'Estudiantes RETIRADOS en SIMAT pero no aparecen en SINAI';
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
    $consulta=$cnx->query('SELECT * FROM simat WHERE estado ="RETIRADO" AND numDoc NOT IN (SELECT numDoc FROM sinai)');
    $cant=0;
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
    echo'Estudiantes con estado RETIRADO en SIMAT';
    echo '
        <table class="tablaBD tablaBienes" border=1>
            <thead>
                <tr class="stickyHead1">
                    <th>GRUPO</th>                    
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>TIPO DOC</th>
                    <th>DOCUMENTO</th>
                    <th>ESTADO SINAI</th>
                    <th>ESTADO SIMAT</th>
			    </tr>
            </thead> 
    ';
    $consulta=$cnx->query('SELECT sinai.grupo,sinai.apellidos, sinai.nombres, sinai.tipoDoc, sinai.numDoc, sinai.estado,simat.estado
                            FROM simat INNER JOIN sinai 
                            WHERE simat.estado="RETIRADO" AND sinai.numDoc=simat.numDoc
                            ORDER BY sinai.estado, sinai.grupo ASC, sinai.apellidos, sinai.nombres ASC');
    $cant=0;
    while ($fila=mysqli_fetch_array($consulta)){
        echo '
            <tr>
                <td>'.$fila[0].'</td>
                <td>'.$fila[1].'</td>
                <td>'.$fila[2].'</td>
                <td>'.$fila[3].'</td>
                <td>'.$fila[4].'</td>
                <td>'.$fila[5].'</td>
                <td>'.$fila[6].'</td>
            </tr>
        ';
        $cant++;
    }
    echo "Total: ".$cant;
    echo'</table><br>';    
?>