<?php
    require_once('../../03-cnt/00-Ppal/reporte01.php');
    foreach($respuesta2 as $registro2){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['sede'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['grupo'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['estadoSinai'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['fechaSinai'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['estadoSimat'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['fechaSimat'].'</div>';
        echo'</div>';
    }            
?>