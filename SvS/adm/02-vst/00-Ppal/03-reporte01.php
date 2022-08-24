<?php
    require('../../03-cnt/00-Ppal/reporte01.php');
    if($respuesta1!=NULL):
?>
<div class="enunciado">Estudiantes MATRICULADOS en SINAI pero no en SIMAT. TOTAL: <?php echo (count($respuesta1)+count($respuesta2)); ?></div>
<div class="contenedor-Tabla">    
    <div class="grid encabezado">   
        <div class="tituloGrid">No.</div>
<?php
    foreach($tituloEncabezado1 as $t1){
        echo '<div class="tituloGrid">'.$t1.'</div>';   
    }            
?>
    </div>
    <div class="grid filtro">
<?php
    for($i=0;$i<count($tituloEncabezado1)+1;$i++){
        echo'
            <form class="formFiltro">
        ';
        if($i===3||$i===6||$i===7||$i===8){            
            echo'
                <div class="multiselect">
                    <div class="selectBox" onclick="showCheckboxes('.$i.')">
                        <select>
                            <option></option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes'.$i.'" class="checkboxes">
            ';
            switch($i){
                case 3:
                    foreach($filtros['tipoDoc'] as $f){            
                        echo'                    
                            <label for='.$f.'><input type="checkbox" id='.$f.' />'.$f.'</label>
                        ';
                    }   
                    break;  
                case 6:
                    foreach($filtros['grupo'] as $f){            
                        echo'                    
                            <label for='.$f.'><input type="checkbox" id='.$f.' />'.$f.'</label>
                        ';
                    }   
                    break; 
                case 7:
                    foreach($filtros['estado'] as $f){            
                        echo'                    
                            <label for='.$f.'><input type="checkbox" id='.$f.' />'.$f.'</label>
                        ';
                    }   
                    break; 
                case 8:
                    foreach($filtros['fechaEstado'] as $f){            
                        echo'                    
                            <label for='.$f.'><input type="checkbox" id='.$f.' />'.$f.'</label>
                        ';
                    }   
                    break;          
            }
            echo'
                        </div>
                    </div>
            ';
            
        }
        echo'
            </form>
        ';
    }         
?> 
    </div>        
<?php
    $cnt=0;
    foreach($respuesta1 as $registro1){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">-</div>';
            echo '<div class="cuerpoGrid">'.$registro1['grupo'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['estado'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro1['fechaEstado'].'</div>';
            echo '<div class="cuerpoGrid">-</div>';
            echo '<div class="cuerpoGrid">-</div>';
        echo'</div>';
    } 
    foreach($respuesta2 as $registro2){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">-</div>';
            echo '<div class="cuerpoGrid">'.$registro2['grupo'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['estadoSinai'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['fechaSinai'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['estadoSimat'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro2['fechaSimat'].'</div>';
        echo'</div>';
    }            
?>    
</div>
<?php  else: ?>
<div class="enunciado">Estudiantes MATRICULADOS en SINAI pero no en SIMAT. TOTAL: 0</div>
<?php 
    endif;
    if($respuesta3!=NULL):
?>
<div class="enunciado">Estudiantes MATRICULADOS en SIMAT pero no en SINAI. TOTAL: <?php echo count($respuesta3); ?></div>
<div class="contenedor-Tabla">    
    <div class="grid encabezado">   
        <div class="tituloGrid">No.</div>
<?php
    foreach($tituloEncabezado2 as $t2){
        echo '<div class="tituloGrid">'.$t2.'</div>';
    }            
?>
    </div>    
<?php
    $cnt=0;
    foreach($respuesta3 as $registro3){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">-</div>';
            echo '<div class="cuerpoGrid">'.$registro3['grupo'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['estado'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['fechaEstado'].'</div>';
            echo '<div class="cuerpoGrid">-</div>';
            echo '<div class="cuerpoGrid">-</div>';
        echo'</div>';
    }         
?>    
</div>
<?php  else: ?>
<div class="enunciado">Estudiantes MATRICULADOS en SIMAT pero no en SINAI. TOTAL: 0</div>
<?php 
    endif; 
    if($respuesta4!=NULL):
?>
<div class="enunciado">Estudiantes en grupos diferentes en SIMAT. TOTAL: <?php echo count($respuesta4); ?></div>
<div class="contenedor-Tabla">    
    <div class="grid encabezado">   
        <div class="tituloGrid">No.</div>
<?php
    foreach($tituloEncabezado3 as $t3){
        echo '<div class="tituloGrid">'.$t3.'</div>';
    }            
?>
    </div>    
<?php
    $cnt=0;
    foreach($respuesta4 as $registro4){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">-</div>';
            echo '<div class="cuerpoGrid">'.$registro4['estado'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['grupoSinai'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['grupoSimat'].'</div>';
        echo'</div>';
    }         
?>    
</div>
<?php  else: ?>
<div class="enunciado">Estudiantes en grupos diferentes en SIMAT. TOTAL: 0</div>
<?php endif; ?>