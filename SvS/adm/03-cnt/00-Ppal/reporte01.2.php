<?php
    ini_set('error_prepend_string', '<pre style="white-space: pre-wrap;">');
    error_reporting(-1);
//########## MATRICULADOS SIMAT VS SINAI ##########
    $tabla2='simat';
    $condicion3;
    if(isset($_REQUEST['condicion3'])){
        $condicion3.=$_REQUEST['condicion3'];
    }else{
        $condicion3='institucion='.$id.' AND estado="MATRICULADO" AND numDoc NOT IN (SELECT numDoc FROM sinai)';
    }	
	require_once('../../03-cnt/index.php');
    $respuesta3=modeloController::consultar($tabla2,$condicion3);
    //var_dump($respuesta3);
    $tituloEncabezado2=["APELLIDOS","NOMBRES","TD","NUMDOC","SEDE","GRUPO","ESTADO SIMAT","FECHA ESTADO","ESTADO SINAI","FECHA ESTADO"];
?>