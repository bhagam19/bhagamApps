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

    echo'Estudiantes DIFERENTES A MATRICULADOS en SINAI pero no aparecen en SIMAT';
    echo '
        <table class="tablaBD tablaBienes" border=1>
            <thead>
                <tr class="stickyHead1">
                    <th>GRUPO</th>
                    <th>ESTADO</th>
                    <th>FECHA ESTADO</th>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>TIPO DOC</th>
                    <th>DOCUMENTO</th>
			    </tr>
            </thead> 
    ';
    $consulta=$cnx->query('SELECT * FROM sinai WHERE estado="RETIRADO" AND numDoc NOT IN (SELECT numDoc FROM simat) 
                                                OR estado="DESERTOR" AND numDoc NOT IN (SELECT numDoc FROM simat)');
    $cant=0;
    while ($fila=mysqli_fetch_array($consulta)){
        $cant++;
        echo '
            <tr>
                <td>'.$fila['grupo'].'</td>
                <td>'.$fila['estado'].'</td>
                <td>'.$fila['fechaEstado'].'</td>
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
                    <th>ESTADO SIMAT</th>
                    <th>ESTADO SINAI</th>
                    <th>FECHA SINAI</th>
                    <th>APELLIDOS</th>
                    <th>NOMBRES</th>
                    <th>TIPO DOC</th>
                    <th>DOCUMENTO</th>                    
                    <th>GRUPO</th>
			    </tr>
            </thead> 
    ';
    $consulta=$cnx->query('SELECT simat.estado,sinai.estado,sinai.fechaEstado,sinai.apellidos,sinai.nombres,sinai.tipoDoc,sinai.numDoc,sinai.grupo
                            FROM simat INNER JOIN sinai 
                            WHERE simat.estado="RETIRADO" AND sinai.numDoc=simat.numDoc
                            ORDER BY sinai.Estado,sinai.grupo ASC, sinai.apellidos ASC, sinai.nombres ASC');
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
                <td>'.$fila[7].'</td>
            </tr>
        ';
        $cant++;
    }
    echo "Total: ".$cant;
    echo'</table><br>';    
?>