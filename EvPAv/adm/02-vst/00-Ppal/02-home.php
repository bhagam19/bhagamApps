<?php
    //include ('../../01-mdl/cnx.php');//Agregamos la conexión
    include dirname(__FILE__).'/../../01-mdl/cnx.php';
    echo '
            <div id="reestablecerBD">            
                <form enctype="multipart/form-data" action="adm/03-cnt/00-cargarCsvAnalisisPreguntas.php" method="POST">                    
                    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                    <input name="subir_archivo" type="file" />
                    <input type="submit" value="Importar Datos" />
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
        </select>
    ';
    echo '<br><br><div id="reporte"></div>';
?>