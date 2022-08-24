<?php
//########## MATRICULADOS SINAI VS SIMAT ##########    
    $tituloEncabezado1=["APELLIDOS","NOMBRES","TD","NUMDOC","SEDE","GRUPO","ESTADO SINAI","FECHA ESTADO","ESTADO SIMAT","FECHA ESTADO"];
    $tabla1='sinai';
    $condicion1;
    if(isset($_REQUEST['condicion1'])){
        $condicion1=$_REQUEST['condicion1'];
    }else{
        $condicion1='estado ="MATRICULADO" AND numDoc NOT IN (SELECT numDoc FROM simat)';
    }	
	require_once('../../03-cnt/index.php');
    $respuesta1=modeloController::consultar($tabla1,$condicion1);
    /*===========*/
    $col=0;
    $keys=array();
    $filtros=[];
    foreach($respuesta1 as $registro){    
        $keys=array_keys($registro);        
    }
    foreach($keys as $k){
        $valores=array_column($respuesta1,$k);
        sort($valores);
        $filtros[$k]=array_unique($valores);
    }
    //var_dump($filtros);
    //echo'<br>';
    /*===========*/

    $columnas1='sinai.apellidos,sinai.nombres,sinai.tipoDoc,sinai.numDoc,sinai.estado estadoSinai,sinai.fechaEstado fechaSinai,sinai.grupo,
                simat.estado estadoSimat,simat.fechaEstado fechaSimat';
    $tablaJoin1='sinai';
    $tipoJoin1='LEFT JOIN';
    $tablaJoin2='simat';
    $On1='sinai.numDoc=simat.numDoc';
    $condicion2;
    if(isset($_REQUEST['condicion2'])){
        $condicion2=$_REQUEST['condicion2'];
    }else{
        $condicion2='sinai.estado="MATRICULADO" AND simat.estado!="MATRICULADO"';
    }
    require_once('../../03-cnt/index.php');
    $respuesta2=modeloController::consultarJoin($columnas1,$tablaJoin1,$tipoJoin1,$tablaJoin2,$On1,$condicion2);
//########## MATRICULADOS SIMAT VS SINAI ##########
    $tabla2='simat';
    $condicion3;
    if(isset($_REQUEST['condicion3'])){
        $condicion3=$_REQUEST['condicion3'];
    }else{
        $condicion3='estado="MATRICULADO" AND numDoc NOT IN (SELECT numDoc FROM sinai)';
    }	
	require_once('../../03-cnt/index.php');
    $respuesta3=modeloController::consultar($tabla2,$condicion3);
    //var_dump($respuesta3);
    $tituloEncabezado2=["APELLIDOS","NOMBRES","TD","NUMDOC","SEDE","GRUPO","ESTADO SIMAT","FECHA ESTADO","ESTADO SINAI","FECHA ESTADO"];
//########## GRUPOS DIFERENTES ##########
    $columnas2='sinai.apellidos, sinai.nombres,sinai.tipoDoc,sinai.numDoc,sinai.estado,sinai.grupo grupoSinai, simat.grupo grupoSimat';
    $tablaJoin3='sinai';
    $tipoJoin2='INNER JOIN';
    $tablaJoin4='simat';
    $On2='NOT sinai.grupo=simat.grupo';
    $condicion4;
    if(isset($_REQUEST['condicion4'])){
        $condicion4=$_REQUEST['condicion4'];
    }else{
        $condicion4='sinai.estado="MATRICULADO" AND simat.estado="MATRICULADO" AND sinai.numDoc=simat.numDoc';
    }
    require_once('../../03-cnt/index.php');
    $respuesta4=modeloController::consultarJoin($columnas2,$tablaJoin3,$tipoJoin2,$tablaJoin4,$On2,$condicion4);
    $tituloEncabezado3=["APELLIDOS","NOMBRES","TD","NUMDOC","SEDE","ESTADO SINAI","GRUPO SINAI","GRUPO SIMAT"];
?>