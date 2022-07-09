<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    echo'Estudiantes con país diferente en SIMAT';
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
                    <th>PAÍS SINAI</th>
                    <th>PAÍS SIMAT</th>
			    </tr>
            </thead> 
    ';
    $consulta=$cnx->query('SELECT sinai.grupo, sinai.estado, sinai.apellidos, sinai.nombres, sinai.tipoDoc, sinai.numDoc, sinai.pais, simat.pais FROM sinai INNER JOIN simat 
                            ON NOT sinai.pais=simat.pais WHERE sinai.estado="MATRICULADO" AND simat.estado="MATRICULADO" AND sinai.numDoc=simat.numDoc 
                            ORDER BY sinai.grupo ASC, sinai.apellidos, sinai.nombres ASC');
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