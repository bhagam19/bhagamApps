<?php
    //include ('../../01-mdl/cnx.php');//Agregamos la conexión
    include dirname(__FILE__).'/../../01-mdl/cnx.php';
    echo '
            <div id="reestablecerBD">            
                <form enctype="multipart/form-data" action="adm/03-cnt/00-cargarCsvSinai.php" method="POST">                    
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                    <input name="subir_archivo" type="file" />
                    <input type="submit" value="Importar Datos SINAI" />
                    Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/sinai.csv')).'
                </form>
            </div>
        ';
    
    
    echo '
        <div id="reestablecerBD">            
            <form enctype="multipart/form-data" action="adm/03-cnt/01-cargarCsvSimat.php" method="POST">                    
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <input name="subir_archivo" type="file" />
                <input type="submit" value="Importar Datos SIMAT" />
                Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/simat.csv')).'
            </form>
        </div>
    ';
   echo '
        <div id="reestablecerBD">            
            <form enctype="multipart/form-data" action="adm/03-cnt/02-cargarCsv6AFUC.php" method="POST">                    
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <input name="subir_archivo" type="file" />
                <input type="submit" value="Importar Datos Anexo 6A FUC" />
                Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/Anexo6AFUC.csv')).'
            </form>
        </div>
    ';

    echo '
        <div id="reestablecerBD">            
            <form enctype="multipart/form-data" action="adm/03-cnt/03-cargarCsvEstPAE.php" method="POST">                    
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <input name="subir_archivo" type="file" />
                <input type="submit" value="Importar Datos Estrategia Permanencia" />
                Última versión: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/estPAE.csv')).'
            </form>
        </div>
    ';

    echo '
        Seleccione el reporte deseado:
        <select name="reportes" id="reportes" onchange="cargarReporte(this.value)">
            <option value=0>Seleccione...</option>
            <option value=1>Básico</option>
            <option value=2>EPS</option>
            <option value=3>Teléfono</option>
            <option value=4>País</option>
            <option value=5>Desertores</option>
            <option value=6>PAE</option>
            <option value=7>Retirados SIMAT</option>
        </select>
    ';

    echo '<br><br><div id="reporte"></div>';  
    
?>