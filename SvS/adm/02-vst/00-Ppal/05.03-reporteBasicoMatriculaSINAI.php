<?php
    require_once('../../03-cnt/00-Ppal/reporte01.php');
    $cnt=0;
    foreach($respuesta1 as $registro1){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid" data-titulo="No.">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Apellidos">'.$registro1['apellidos'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Nombres">'.$registro1['nombres'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Tipo Doc">'.$registro1['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Num Doc">'.$registro1['numDoc'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Sede">'.$registro1['sede'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Grupo">'.$registro1['grupo'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Estado">'.$registro1['estado'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="Fecha">'.$registro1['fechaEstado'].'</div>';
            echo '<div class="cuerpoGrid" data-titulo="SIMAT">EN OTRA IE</div>';
            echo '<div class="cuerpoGrid" data-titulo="Fecha">-</div>';
        echo'</div>';
    }          
?>