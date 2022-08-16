<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    echo'Estudiantes en SINAI pero no aparecen en SIMAT';
    echo '
        <table class="tablaBD tablaBienes" border=1>
            <thead>
                <tr class="stickyHead1">
                    <th>GRUPO</th>
                    <th>ESTADO SINAI</th>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>TIPO DOC</th>
                    <th>DOCUMENTO</th>
                    <th>ESTADO SIMAT</th>
			    </tr>
            </thead> 
    ';
    $consulta=$cnx->query('SELECT * FROM sinai WHERE estado ="MATRICULADO" AND numDoc NOT IN (SELECT numDoc FROM simat)');
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
                <td></td>
            </tr>
        ';
    }
    $consulta=$cnx->query('SELECT sinai.grupo,sinai.estado,sinai.apellidos,sinai.nombres,sinai.tipoDoc,sinai.numDoc,simat.estado
                            FROM sinai LEFT JOIN simat
                            ON sinai.numDoc=simat.numDoc
                            WHERE sinai.estado="MATRICULADO" AND simat.estado!="MATRICULADO"');
    while ($fila=mysqli_fetch_array($consulta)){
        $cant++;
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
    }
    echo "Total: ".$cant;
    echo'</table><br>';
    echo'Estudiantes en SIMAT pero no aparecen en SINAI';
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
    $consulta=$cnx->query('SELECT * FROM simat WHERE estado ="MATRICULADO" AND numDoc NOT IN (SELECT numDoc FROM sinai)');
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

    echo'Estudiantes en grupos diferentes en SIMAT';
    echo '
        <table class="tablaBD tablaBienes" border=1>
            <thead>
                <tr class="stickyHead1">
                    <th>GRUPO SINAI</th>
                    <th>GRUPO SIMAT</th>
                    <th>ESTADO</th>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>TIPO DOC</th>
                    <th>DOCUMENTO</th>
			    </tr>
            </thead> 
    ';
    $consulta=$cnx->query('SELECT sinai.grupo,simat.grupo,sinai.estado, sinai.apellidos, sinai.nombres, sinai.tipoDoc, sinai.numDoc FROM sinai INNER JOIN simat 
                            ON NOT sinai.grupo=simat.grupo WHERE sinai.estado="MATRICULADO" AND simat.estado="MATRICULADO" AND sinai.numDoc=simat.numDoc');
    $cant=0;
    while ($fila=mysqli_fetch_array($consulta)){
        $cant++;
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
    }
    echo "Total: ".$cant;
    echo'</table><br>';

?>