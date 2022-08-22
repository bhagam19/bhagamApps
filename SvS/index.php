<?php
    session_name("SINSIMAT");
	session_start();
    require_once dirname(__FILE__).'/adm/03-cnt/index.php';
    $dato=new modeloController();
    $dat=$dato->verificarInstalacion();
    if($dat===NULL):        
        modeloController::instalar();        
    else:
        modeloController::index();
    endif;
?>
