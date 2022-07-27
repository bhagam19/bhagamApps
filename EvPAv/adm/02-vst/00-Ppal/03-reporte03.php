<?php
    include dirname(__FILE__).'/../../01-mdl/cnx.php';
    echo '
            <div id="inputID">            
                <input type="text" name="idNum" id="idNum"/>
                <input type="submit" id="btnBuscar" value="Buscar" onclick="buscar(idNum.value)" />               
            </div>
            <div id="contenedorReporteIndividual">
            
            </div>
        ';
?>