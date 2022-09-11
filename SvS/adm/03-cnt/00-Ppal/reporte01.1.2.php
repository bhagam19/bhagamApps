<?php
    ini_set('error_prepend_string', '<pre style="white-space: pre-wrap;">');
    error_reporting(-1);
//########## MATRICULADOS SINAI VS SIMAT ##########        
    /*===========*/
    $columnas1='sinai.institucion,sinai.sede,sinai.apellidos,sinai.nombres,sinai.tipoDoc,sinai.numDoc,sinai.estado estadoSinai,sinai.fechaEstado fechaSinai,sinai.grupo,
                simat.estado estadoSimat,simat.fechaEstado fechaSimat';
    $tablaJoin1='sinai';
    $tipoJoin1='LEFT JOIN';
    $tablaJoin2='simat';
    $On1='sinai.numDoc=simat.numDoc';
    $condicion2;
    if(isset($_REQUEST['condicion2'])){
        $condicion2.=$_REQUEST['condicion2'];
    }else{
        $condicion2='sinai.institucion='.$id.' AND simat.institucion='.$id.' AND sinai.estado="MATRICULADO" AND simat.estado!="MATRICULADO"';
    }
    require_once('../../03-cnt/index.php');
    $respuesta2=modeloController::consultarJoin($columnas1,$tablaJoin1,$tipoJoin1,$tablaJoin2,$On1,$condicion2);
?>