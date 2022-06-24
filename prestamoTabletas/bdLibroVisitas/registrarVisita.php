<?php
    include('../conexion/datosConexion.php');
    
    $utc = date ('U');
    $anio = date ('Y');
    $mes = date ('m');
    $dia = date ('d');
    $hora = date ('H');
    $min = date ('i');
    $seg = date ('s');
    @$ip=getenv(REMOTE_ADDR);
    $navegador=$_SERVER['HTTP_USER_AGENT'];
    @$usuariolog=$_SESSION['usuario'];
    
    $pagVisitada="<a href=\'".$pagina.".php\' target=\'_blank\'>".$link."</a>";
    
    if(!$usuariolog){
    	$usuariolog="Anonimo";
    }
    
    
    
    $tabla='logs';
    $sql=mysqli_query($conexion,"INSERT INTO ".$tabla." (utc, anio, mes, dia, hora, minuto, segundo, ip, navegador, usuario,pagVisitada)
    VALUES ($utc,'$anio','$mes','$dia','$hora','$min','$seg','$ip','$navegador','$usuariolog','$pagVisitada')	
    ");
    
    mysqli_close($conexion);
?>