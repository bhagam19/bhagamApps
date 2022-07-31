<?php
    error_reporting(0);
    //include ('../../01-mdl/cnx.php');//Agregamos la conexión
    include dirname(__FILE__).'/../../01-mdl/cnx.php';
    echo '
        <div id="contImportarDatos">
            <h1>Importar Datos</h1>
            <div id="contForm"> 
                <div id="formLabel">Análisis de Pregunta</div>
                <form enctype="multipart/form-data" action="adm/03-cnt/00-cargarCsvAnalisisPreguntas.php" method="POST"> 
                    <input id="inputTag" type="file" name="subir_archivo"/><br>
                    <input type="submit" value="Enviar" />                     
                </form>    
                <div>Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/analisisPreguntas.csv')).'</div>            
            </div>
        ';
        echo '
            <div id="contForm">
                <div id="formLabel">Análisis de Áreas</div>        
                <form enctype="multipart/form-data" action="adm/03-cnt/00-cargarCsvAnalisisAreas.php" method="POST">                    
                    <input name="subir_archivo" type="file" /><br>
                    <input type="submit" value="Enviar" />                    
                </form>    
                <div>Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/analisisAreas.csv')).'</div>             
            </div>
        ';
        echo '
            <div id="contForm">
                <div id="formLabel">Desempeños Individuales</div>        
                <form enctype="multipart/form-data" action="adm/03-cnt/00-cargarCsvAnalisisEstudiantes.php" method="POST">                    
                    <input name="subir_archivo" type="file" /><br>
                    <input type="submit" value="Enviar" />                    
                </form>    
                <div>Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/analisisEstudiantes.csv')).'</div>             
            </div>
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