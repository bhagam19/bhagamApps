<?php
    include('../../01-mdl/cnx.php');//Agregamos la conexión
    $numAreas=mysqli_num_rows($cnx->query('SELECT DISTINCT instrumento FROM analisisPreguntas')); 
    echo '
        <div id="numEst">
            Se evaluaron '.$numAreas.' areas.
        </div>
    ';
    $consulta=$cnx->query('SELECT DISTINCT instrumento FROM analisisPreguntas');
    $numPruebas=mysqli_num_rows($consulta); 
    while($f1=mysqli_fetch_array($consulta)){
        echo'
            <div class="contenedor-instrumentos">                
                <div class="titulo-instrumento">'.$f1['instrumento'].'</div>
                <div class="contenedor-componentes">                
        ';
        $consultaComponentes=$cnx->query('SELECT DISTINCT componente FROM analisisPreguntas WHERE instrumento="'.$f1['instrumento'].'"');
        while($f2=mysqli_fetch_array($consultaComponentes)){
            echo'      
                <div class="contenedor-componente"> 
                    <div class="titulo-componente">'.$f2['componente'].'</div>
                    <div class="contenedor-competencias">                 
            ';
            $consultaCompetencia=$cnx->query('SELECT DISTINCT competencia FROM analisisPreguntas WHERE instrumento="'.$f1['instrumento'].'" 
                                            AND componente="'.$f2['componente'].'"');                                  
            while($f3=mysqli_fetch_array($consultaCompetencia)){
                echo'  
                <div class="contenedor-competencia">             
                    <div class="titulo-competencia">'.$f3['competencia'].'</div>
                </div>
                ';
            }
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
            <div class="grid encabezado">
                <div class="tituloGrid" title="Instrumento">INSTRUM.</div>
                <div class="tituloGrid" title="Cuadernillo">CD.</div>
                <div class="tituloGrid" title="Id Pregunta">ID</div>
                <div class="tituloGrid" title="Clave">CL</div>
                <div class="tituloGrid" title="Grado">GD</div>
                <div class="tituloGrid" title="Grupo">GRP</div>
                <div class="tituloGrid">COMPONENTE</div>
                <div class="tituloGrid">COMPETENCIA</div>
                <div class="tituloGrid">AFIRMACIÓN</div>
                <div class="tituloGrid">EVIDENCIA</div>
                <div class="tituloGrid">DIFICULTAD</div>
                <div class="tituloGrid" title="Respuestas Correctas">RESP. CORR.</div>
                <div class="tituloGrid" title="Respuestas Omitidas">RESP. OMIT.</div>
                <div class="tituloGrid">OPC A</div>
                <div class="tituloGrid">OPC B</div>
                <div class="tituloGrid">OPC C</div>
                <div class="tituloGrid">OPC D</div>
            </div>
            <div class="grid filtro">
                <div class="filtroGrid">
                    <select onchange="aplicarFiltro()">
                        <option>por Inst...</option>
                    </select>
                </div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid">
                    <select onchange="aplicarFiltro()">
                        <option>por Grado...</option>
                    </select>
                </div>
                <div class="filtroGrid">
                    <select onchange="aplicarFiltro()">
                        <option>por Grupo...</option>
                    </select>
                </div>
                <div class="filtroGrid">
                    <select onchange="aplicarFiltro()">
                        <option>por Comp...</option>
                    </select>
                </div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
                <div class="filtroGrid"></div>
            </div>
       
    ';
    $consulta=$cnx->query('SELECT * FROM analisisPreguntas');
    while ($fila=mysqli_fetch_array($consulta)){
        echo '        
            <div class="grid cuerpo">
                <div class="cuerpoGrid">'.$fila['instrumento'].'</div>
                <div class="cuerpoGrid">'.$fila['cuadernillo'].'</div>
                <div class="cuerpoGrid">'.$fila['idPregunta'].'</div>
                <div class="cuerpoGrid">'.$fila['clave'].'</div>
                <div class="cuerpoGrid">'.$fila['grado'].'</div>
                <div class="cuerpoGrid">'.$fila['grupo'].'</div>
                <div class="cuerpoGrid">'.$fila['componente'].'</div>
                <div class="cuerpoGrid">'.$fila['competencia'].'</div>
                <div class="cuerpoGrid">'.$fila['afirmacion'].'</div>
                <div class="cuerpoGrid ancho">'.$fila['evidencia'].'</div>
                <div class="cuerpoGrid">'.$fila['nivelDificultad'].'</div>
                <div class="cuerpoGrid">'.$fila['respCorrectas'].'</div>
                <div class="cuerpoGrid">'.$fila['omisiones'].'</div>
                <div class="cuerpoGrid">'.$fila['opcA'].'</div>
                <div class="cuerpoGrid">'.$fila['opcB'].'</div>
                <div class="cuerpoGrid">'.$fila['opcC'].'</div>
                <div class="cuerpoGrid">'.$fila['opcD'].'</div>
            </div>
        ';
    }
    echo'
           
        </div>
        <br>
    ';
?>