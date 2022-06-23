<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    echo'<br>';
    echo'Estudiantes DESERTORES en SINAI';
    echo '<table border=1>
			<tr>
				<td>GRUPO</td>
				<td>ESTADO</td>
                <td>APELLIDOS</td>
                <td>NOMBRES</td>
                <td>TIPO DOC</td>
                <td>DOCUMENTO</td>
			</tr>';
    $consulta=$cnx->query('SELECT * FROM sinai WHERE estado ="DESERTOR"');
    while ($fila=mysqli_fetch_array($consulta)){
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
    echo'</table><br>';

    echo'Estudiantes en SINAI pero no aparecen en SIMAT';
    echo '<table border=1>
			<tr>
				<td>GRUPO</td>
				<td>ESTADO</td>
                <td>APELLIDOS</td>
                <td>NOMBRES</td>
                <td>TIPO DOC</td>
                <td>DOCUMENTO</td>
			</tr>';
    $consulta=$cnx->query('SELECT * FROM sinai WHERE estado ="MATRICULADO" AND numDoc NOT IN (SELECT numDoc FROM simat)');
    while ($fila=mysqli_fetch_array($consulta)){
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
    echo'</table><br>';
    echo'Estudiantes en SIMAT pero no aparecen en SINAI';
    echo '<table border=1>
			<tr>
				<td>GRUPO</td>
				<td>ESTADO</td>
                <td>APELLIDOS</td>
                <td>NOMBRES</td>
                <td>TIPO DOC</td>
                <td>DOCUMENTO</td>
			</tr>';
    $consulta=$cnx->query('SELECT * FROM simat WHERE estado ="MATRICULADO" AND numDoc NOT IN (SELECT numDoc FROM sinai)');
    while ($fila=mysqli_fetch_array($consulta)){
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
    echo'</table><br>';

    echo'Estudiantes en grupos diferentes en SIMAT';
    echo '<table border=1>
			<tr>
				<td>GRUPO SINAI</td>
                <td>GRUPO SIMAT</td>
				<td>ESTADO</td>
                <td>APELLIDOS</td>
                <td>NOMBRES</td>
                <td>TIPO DOC</td>
                <td>DOCUMENTO</td>
			</tr>';
    $consulta=$cnx->query('SELECT simat.grupo,sinai.grupo,sinai.estado, sinai.apellidos, sinai.nombres, sinai.tipoDoc, sinai.numDoc FROM sinai INNER JOIN simat 
                            ON NOT sinai.grupo=simat.grupo WHERE sinai.estado="MATRICULADO" AND simat.estado="MATRICULADO" AND sinai.numDoc=simat.numDoc');
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
    }
    echo'</table><br>';

?>