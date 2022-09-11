<?php
    ini_set('error_prepend_string', '<pre style="white-space: pre-wrap;">');
    error_reporting(-1);
//########## MATRICULADOS SINAI VS SIMAT ##########    
    $tituloEncabezado1=["APELLIDOS","NOMBRES","TD","NUMDOC","SEDE","GRUPO","ESTADO SINAI","FECHA ESTADO","ESTADO SIMAT","FECHA ESTADO"];
    $tabla1='sinai'; 
    if(!isset($_GET['condicion1'])){
        $condicion1='institucion='.$id.' AND estado =\'MATRICULADO\' AND numDoc NOT IN (SELECT numDoc FROM simat)';
    }
    $condicion1=str_replace("\'","'",$condicion1);
    //echo $condicion1." en reporte01.php <br>";
	require_once('../../03-cnt/index.php');
    $respuesta1=modeloController::consultar($tabla1,$condicion1);
    /*===========*/
    $keys=array();
    $filtros=[];
    if($respuesta1!=NULL):        
        foreach($respuesta1 as $registro){    
            $keys=array_keys($registro);        
        }
        foreach($keys as $k){
            $valores=array_column($respuesta1,$k);
            sort($valores);
            $filtros[$k]=array_unique($valores);
        }
    endif;
?>