<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    echo'<br>';
    echo'Estudiantes con telefono diferente en SIMAT';
    echo '<table border=1>
			<tr>
				<td>GRUPO</td>
				<td>ESTADO</td>
                <td>APELLIDOS</td>
                <td>NOMBRES</td>
                <td>TIPO DOC</td>
                <td>DOCUMENTO</td>
                <td>TELÉFONO SINAI</td>
                <td>TELÉFONO SIMAT</td>
			</tr>';
    $consulta=$cnx->query('SELECT sinai.grupo, sinai.estado, sinai.apellidos, sinai.nombres, sinai.tipoDoc, sinai.numDoc, sinai.telefono, simat.telefono FROM sinai INNER JOIN simat 
                            ON NOT sinai.telefono=simat.telefono WHERE sinai.estado="MATRICULADO" AND simat.estado="MATRICULADO" AND sinai.numDoc=simat.numDoc
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