<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    echo'Estudiantes DESERTORES en SINAI';
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
?>