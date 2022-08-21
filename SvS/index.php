<?php
    require_once dirname(__FILE__).'/adm/03-cnt/index.php';
    $dato=new modeloController();
    $dat=$dato->verificarInstalacion();
    if($dat===NULL):        
        modeloController::instalar();        
    else:
        modeloController::index("instalacion","1");
    endif;
?>
