<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    $numEst=mysqli_num_rows($cnx->query('SELECT DISTINCT estudiante FROM analisisAreas')); 
    echo '
        <div id="numEst">
            '.$numEst.' estudiantes presentaron la prueba Evaluar para Avanzar.
        </div>
    ';
    
    $consulta=$cnx->query('SELECT DISTINCT instrumento FROM analisisAreas');
    while($f1=mysqli_fetch_array($consulta)){
        echo'
            <div class="contenedor-instrumentos">                
                <div class="titulo-instrumento">'.$f1['instrumento'].'</div>
                <div class="contenedor-componentes">                
        ';
        $consultaGrupos=$cnx->query('SELECT DISTINCT grupo FROM analisisAreas WHERE instrumento="'.$f1['instrumento'].'"');
        while($f2=mysqli_fetch_array($consultaGrupos)){
            echo'      
                <div class="contenedor-componente"> 
                    <label for="state">  
                        <div class="titulo-componente">'.$f2['grupo'].'</div>
                    </label>
                    <input type="checkbox" id="state" >
                        <div class="contenedor-competencias">                 
            ';
            $consultaEstudiantes=$cnx->query('SELECT DISTINCT estudiante FROM analisisAreas WHERE instrumento="'.$f1['instrumento'].'" 
                                            AND grupo="'.$f2['grupo'].'"');      
            $numEst=mysqli_num_rows($consultaEstudiantes); 
            $consultaDesempenos=$cnx->query('SELECT ttlRespCorrectas FROM analisisAreas WHERE instrumento="'.$f1['instrumento'].'" 
                                            AND grupo="'.$f2['grupo'].'"');
            $sup=0;
            $alt=0;
            $bas=0;
            $baj=0;
            $min=0;
            while($f3=mysqli_fetch_array($consultaDesempenos)){
                if($f3['ttlRespCorrectas']<6){
                    $min++;
                }else if($f3['ttlRespCorrectas']<12){
                    $baj++;
                }else if($f3['ttlRespCorrectas']<16){
                    $bas++;
                }else if($f3['ttlRespCorrectas']<18){
                    $alt++;
                }else{
                    $sup++;
                }
            }          
            echo'  
                        <div class="contenedor-competencia">                              
                        <div class="titulo-competencia"> Muestra: '.$numEst.'</div>                    
                            <div class="contenedor-grafica">
                                <div>
                                    <div class="titulo-competencia"> Superior: '.$sup.'</div>
                                    <div class="titulo-competencia"> Alto: '.$alt.'</div>
                                    <div class="titulo-competencia"> Básico: '.$bas.'</div>
                                    <div class="titulo-competencia"> Bajo: '.$baj.'</div>
                                    <div class="titulo-competencia"> Mínimo: '.$min.'</div>
                                </div>
            ';
            $sup=round($sup/$numEst*100,2);
            $alt=round($alt/$numEst*100,2);
            $bas=round($bas/$numEst*100,2);
            $baj=round($baj/$numEst*100,2);
            $min=round($min/$numEst*100,2);
            echo'
                        <div>
                            <div class="barra superior" style="width:'.$sup.'%">'.$sup.'</div>
                            <div class="barra alto" style="width:'.$alt.'%">'.$alt.'</div>
                            <div class="barra basico" style="width:'.$bas.'%">'.$bas.'</div>
                            <div class="barra bajo" style="width:'.$baj.'%">'.$baj.'</div>
                            <div class="barra min" style="width:'.$min.'%">'.$min.'</div>
                        </div>
                    </div>
                </div>
            ';
            /*                    
            while($f3=mysqli_fetch_array($consultaCompetencia)){
                echo'  
                <div class="contenedor-competencia">             
                    <div class="titulo-competencia">'.$f3['estudiante'].'</div>
                </div>
                ';
            }
            */
            echo'
                    </div>
                </div>
            ';
        }
        echo'                
                </div>
            </div>
        ';
    }
    
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