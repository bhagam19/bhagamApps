<?php
    error_reporting(-1);
    function isValidJSON($str) {
        json_decode($str);
        return json_last_error() == JSON_ERROR_NONE;
    }    
    $json_params = file_get_contents("php://input");    
    if (strlen($json_params) > 0 && isValidJSON($json_params)){
        $decoded_params = json_decode($json_params);
        $id = $decoded_params->id;
    }
    include dirname(__FILE__).'../../01-mdl/cnx.php';
    $consulta=$cnx->query('SELECT DISTINCT instrumento, estudiante FROM analisisEstudiantes WHERE idEstudiante="'.$id.'"');
    $numPruebas=mysqli_num_rows($consulta);    
    $estudiante="";
    
    while($fila=mysqli_fetch_array($consulta)){
        $estudiante=$fila['estudiante'];
    }
    echo "
        <div class='encabezadoReporte'>
            <div class='reporteSaludo'>Hola, ".ucwords(strtolower($estudiante))."</div>
            <div class='reporteCantidadPruebas'>Presentaste ".$numPruebas." pruebas:</div>
        </div>
        <div class='reporteCuerpo'>
    ";    
    $consulta=$cnx->query('SELECT DISTINCT instrumento FROM analisisEstudiantes WHERE idEstudiante="'.$id.'"');    
    $cnt=0;
    while($fila=mysqli_fetch_array($consulta)){
        $cnt++;        
        echo "<div class='reporteInstrumento'>";
        echo "<div class='reporteTituloInstrumento'>".$cnt.") ".$fila['instrumento']."</div>";
        $consultaTtlResp=$cnx->query('SELECT DISTINCT idPregunta FROM analisisEstudiantes WHERE idEstudiante="'.$id.'" 
                            AND instrumento="'.$fila['instrumento'].'" AND NOT idPregunta="Total resp"');
        $consultaRespCorrecta=$cnx->query('SELECT DISTINCT idPregunta, respEstudiante FROM analisisEstudiantes WHERE idEstudiante="'.$id.'" 
                            AND instrumento="'.$fila['instrumento'].'" AND NOT idPregunta="Total resp" AND clave = respEstudiante');
        $consultaRespIncorrecta=$cnx->query('SELECT DISTINCT idPregunta, clave, respEstudiante FROM analisisEstudiantes WHERE idEstudiante="'.$id.'" 
                            AND instrumento="'.$fila['instrumento'].'" AND NOT idPregunta="Total resp" AND NOT clave = respEstudiante'); 
        $consultaRespuestas=$cnx->query('SELECT DISTINCT idPregunta, clave, respEstudiante FROM analisisEstudiantes WHERE idEstudiante="'.$id.'" 
                            AND instrumento="'.$fila['instrumento'].'" AND NOT idPregunta="Total resp"');                            
        $ttlResp=mysqli_num_rows($consultaTtlResp);
        $respCorrectas=mysqli_num_rows($consultaRespCorrecta);
        $respIncorrectas=mysqli_num_rows($consultaRespIncorrecta);
        echo "<div class='reporteTituloRespuestasCorrectas'>Respuestas correctas: ".$respCorrectas." de ".$ttlResp.
             " (".($respCorrectas*(5/$ttlResp))." - ".(($respCorrectas/$ttlResp)*100)."%) </div>";
        echo "<div class='reporteTituloRespuestasIncorrectas'>Respuestas Incorrectas: ".$respIncorrectas."</div>";
        echo "<div class='reporteResumenRespuestas'>";
        while($fila4=mysqli_fetch_array($consultaRespuestas)){
            if($fila4['respEstudiante']===$fila4['clave']){
                echo "<p class='respuestaBuena'>Pregunta ".$fila4['idPregunta']." = respuesta: ".$fila4['respEstudiante']." = Bien.</p>";
            }else{
                echo "<p class='respuestaMala'>Pregunta ".$fila4['idPregunta']." = respuesta: ".$fila4['respEstudiante']." = Mal. Clave: ".$fila4['clave']."</p>";
            }            
        }        
        echo"</div>";
        echo "</div>";
    }       
    mysqli_close($cnx);
?>