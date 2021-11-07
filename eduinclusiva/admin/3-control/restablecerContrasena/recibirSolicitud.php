<?php
    session_start();
    $path1=$_SERVER['DOCUMENT_ROOT'];
    $path1 .= "/negocioNormal/admin/";
    $mail=$_POST['mail'];
    $bytes=random_bytes(5);
    $token=bin2hex($bytes);
    include ('enviarMail.php');
    if ($enviado){
        $case="insertar";
        include($path1.'3-control/restablecerContrasena/consultasSql.php');
        header('Location: http://localhost/negocioNormal/admin/2-vista/restablecerContrasena/recibirSolicitud.php');
    }
    
?>