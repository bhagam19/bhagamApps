<?php
    error_reporting(0);
    //include ('../../01-mdl/cnx.php');//Agregamos la conexión
    include dirname(__FILE__).'/../../01-mdl/cnx.php';
    echo '
            <div id="reestablecerBD">            
                <form enctype="multipart/form-data" action="adm/03-cnt/00-cargarCsvAnalisisPreguntas.php" method="POST">                    
                    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                    <input name="subir_archivo" type="file" />
                    <input type="submit" value="Importar Datos Analisis de Preguntas" />
                    Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/analisisPreguntas.csv')).'
                </form>                
            </div>
        ';
        echo '
        <div id="reestablecerBD">            
            <form enctype="multipart/form-data" action="adm/03-cnt/00-cargarCsvAnalisisAreas.php" method="POST">                    
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                <input name="subir_archivo" type="file" />
                <input type="submit" value="Importar Datos Analisis de Areas" />
                Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/analisisAreas.csv')).'
            </form>                
        </div>
    ';
    
    echo '
        Seleccione el reporte deseado:
        <select name="reportes" id="reportes" onchange="cargarReporte(this.value)">
            <option value=0>Seleccione...</option>
            <option value=1>Análisis de Preguntas</option>
            <option value=2>Análisis de Áreas</option>
            <option value=3>Desempeños Individuales</option>
        </select>
    ';
    echo '<br><br><div id="reporte"></div>';
?>