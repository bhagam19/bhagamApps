<?php
    ini_set('error_prepend_string', '<pre style="white-space: pre-wrap;">');
    error_reporting(-1);
//########## GRUPOS DIFERENTES ##########
    $columnas2='sinai.institucion,sinai.apellidos, sinai.nombres,sinai.tipoDoc,sinai.numDoc,sinai.sede,sinai.estado,sinai.grupo grupoSinai, simat.grupo grupoSimat';
    $tablaJoin3='sinai';
    $tipoJoin2='INNER JOIN';
    $tablaJoin4='simat';
    $On2='NOT sinai.grupo=simat.grupo';
    $condicion4;
    if(isset($_REQUEST['condicion4'])){
        $condicion4.=$_REQUEST['condicion4'];
    }else{
        $condicion4='sinai.institucion='.$id.' AND simat.institucion='.$id.' AND sinai.estado="MATRICULADO" AND simat.estado="MATRICULADO" AND sinai.numDoc=simat.numDoc';
    }
    require_once('../../03-cnt/index.php');
    $respuesta4=modeloController::consultarJoin($columnas2,$tablaJoin3,$tipoJoin2,$tablaJoin4,$On2,$condicion4);
    $tituloEncabezado3=["APELLIDOS","NOMBRES","TD","NUMDOC","SEDE","ESTADO SINAI","GRUPO SINAI","GRUPO SIMAT"];
?>