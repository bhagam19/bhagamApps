<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    $numEst=mysqli_num_rows($cnx->query('SELECT DISTINCT estudiante FROM analisisAreas')); 
    echo '
        <div id="numEst">
            '.$numEst.' estudiantes presentaron la prueba Evaluar para Avanzar.
        </div>
    ';
    echo '
        <div id="contenedorTabla">
            <table class="tablaBD" border=1>
                <thead>
                    <tr class="stickyHead1">
                        <th>INSTRUMENTO</th>
                        <th>CUADERNILLO</th>
                        <th>GRADO</th>
                        <th>GRUPO</th>
                        <th>ID ESTUDIANTE</th>
                        <th>ESTUDIANTE</th>
                        <th>RESP. CORRECTAS</th>
                        <th>% RESP. CORRECTAS</th>
                        <th>% OMISIONES</th>
                        <th>FECHA PRESENTACIÓN</th>
                        <th>MODALIDAD</th>
                    </tr>
                </thead> 
    ';
    $consulta=$cnx->query('SELECT * FROM analisisAreas');
    while ($fila=mysqli_fetch_array($consulta)){
        echo '
                <tr>
                    <td>'.$fila['instrumento'].'</td>
                    <td>'.$fila['cuadernillo'].'</td>
                    <td>'.$fila['grado'].'</td>
                    <td>'.$fila['grupo'].'</td>
                    <td>'.$fila['idEstudiante'].'</td>
                    <td>'.$fila['estudiante'].'</td>
                    <td>'.$fila['ttlRespCorrectas'].'</td>
                    <td>'.$fila['respCorrectas'].'</td>
                    <td>'.$fila['omisiones'].'</td>
                    <td>'.$fila['fecha'].'</td>
                    <td>'.$fila['modalidad'].'</td>
                </tr>
        ';
    }
    echo'
            </table><br>
        </div>    
    ';
?>