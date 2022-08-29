<?php
    require_once('../../03-cnt/00-Ppal/reporte01.php');
    $cnt=0;
    foreach($respuesta1 as $registro1){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['sede'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['grupo'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['estado'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['fechaEstado'].'</div>';
            echo '<div class="cuerpoGrid">EN OTRA IE</div>';
            echo '<div class="cuerpoGrid">-</div>';
        echo'</div>';
    }          
?>