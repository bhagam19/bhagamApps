<?php
    session_name("SINSIMAT");
    session_start();
    if(isset($_SESSION['id'])):        
    $id=$_SESSION['id'];
    $condicion1='';
    require_once('../../03-cnt/00-Ppal/reporte01.1.1.php');
    require_once('../../03-cnt/00-Ppal/reporte01.1.2.php');
    $m1=0;
    $m2=0;
    if($respuesta1!=NULL):
        $m1=count($respuesta1);
    endif;
    if($respuesta2!=NULL):
        $m2=count($respuesta2);
    endif;
    echo'
        <div class="enunciado acordeon" id="acc1" onclick="mostrarDivs(this.id)">Estudiantes MATRICULADOS en SINAI pero no en SIMAT. 
            <span class="span-total"> TOTAL: '.($m1+$m2).'</span>
            <span class="ult-version">(Fecha SINAI: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/sinai'.$_SESSION['usuario'].'.csv')).')</span>
            <span class="ult-version">(Fecha SIMAT: '.date('F d Y',filemtime(dirname(__FILE__).'/../../archivos/simat'.$_SESSION['usuario'].'.csv')).')</span>
        </div>
    ';        
        echo'<div class="contenedor-Tabla panel">';
            include('05.01-encabezadoReporteBasico.php');
            echo'<div class="grid filtro" id="filtro">';
                include('05.02-filtrosReporteBasico.php');
            echo'</div>';
            echo'<div class="contenedor-cuerpo" id="contenedor-cuerpo">';
            if($respuesta1!=NULL):
                //echo $condicion1." antes de 05.03.php <br>";
                include('05.03-reporteBasicoMatriculaSINAI.php');
            endif;
            if($respuesta2!=NULL):
                include('05.03.1-reporteBasicoMatriculaSINAI.php');
            endif;
            echo'</div>';
        echo'</div>';    
?>
<?php
    require_once('../../03-cnt/00-Ppal/reporte01.2.php');
    if($respuesta3!=NULL):
?>
<div class="enunciado acordeon" id="acc2" onclick="mostrarDivs(this.id)">Estudiantes MATRICULADOS en SIMAT pero no en SINAI. 
    <span class="span-total">TOTAL: <?php echo count($respuesta3); ?></span></div>
<div class="contenedor-Tabla panel">
    <div class="grid encabezado">
        <div class="tituloGrid">No.</div>
<?php
    foreach($tituloEncabezado2 as $t2){
        echo '<div class="tituloGrid">'.$t2.'</div>';
    }            
?>
    </div>    
<?php
    echo'<div class="contenedor-cuerpo " id="contenedor-cuerpo">';
    $cnt=0;
    foreach($respuesta3 as $registro3){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['sede'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['grupo'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['estado'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro3['fechaEstado'].'</div>';
            echo '<div class="cuerpoGrid">-</div>';
            echo '<div class="cuerpoGrid">-</div>';
        echo'</div>';
    }    
    echo'</div>';     
?>    
</div>
<?php  else: ?>
<div class="enunciado acordeon">Estudiantes MATRICULADOS en SIMAT pero no en SINAI. 
    <span class="span-total">TOTAL: 0</span></div>
<?php 
    endif; 
    require_once('../../03-cnt/00-Ppal/reporte01.3.php');
    if($respuesta4!=NULL):
?>
<div class="enunciado acordeon" id="acc3" onclick="mostrarDivs(this.id)">Estudiantes en grupos diferentes en SIMAT. 
    <span class="span-total">TOTAL: <?php echo count($respuesta4); ?></span></div>
<div class="contenedor-Tabla panel">    
    <div class="grid encabezado">   
        <div class="tituloGrid">No.</div>
<?php
    foreach($tituloEncabezado3 as $t3){
        echo '<div class="tituloGrid">'.$t3.'</div>';
    }            
?>
    </div>    
<?php
    echo'<div class="contenedor-cuerpo" id="contenedor-cuerpo">';
    $cnt=0;
    foreach($respuesta4 as $registro4){
        $cnt++;
        echo'<div class="grid cuerpo">';                    
            echo '<div class="cuerpoGrid">'.$cnt.'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['apellidos'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['nombres'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['tipoDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['numDoc'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['sede'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['estado'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['grupoSinai'].'</div>';
            echo '<div class="cuerpoGrid">'.$registro4['grupoSimat'].'</div>';
        echo'</div>';
    }  
    echo'</div>';       
?>    
</div>
<?php  else: ?>
<div class="enunciado acordeon">Estudiantes en grupos diferentes en SIMAT. <span class="span-total">TOTAL: 0</span></div>
<?php endif; ?>
<?php endif; ?>