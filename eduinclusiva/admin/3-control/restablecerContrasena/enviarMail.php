<?php
    //Generar el código a enviar
    $codigo=rand(100000, 999999);
    // Varios destinatarios
    $para  = $mail . ', '; // atención a la coma

    // título
    $título = 'Proceso de Solicitud Cambio de Contraseña';

    // mensaje
    $mensaje = '
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="utf-8" />
            <title>Reseteo de Contraseña Para entrar a la Administración del sitio</title>
        </head>
    <body>
        <p>Si usted no ha solicitado el reinicio de su contraseña, haga caso omiso a este mensaje!</p>
        <br />
        <br />
        <p>Su código temporal es:</p>
        <br />
        <br />
        <h3>'.$codigo.'</h3>
        <br />
        <br />
        <p>Debe ingresarlo 
            <a href="http://localhost/negocioNormal/admin/2-vista/restablecerContrasena/digitarCodigo.php?mail='.$mail.'&token='.$token.'">aqui</a>
        </p>
        <br />
        <br />
    </body>
    </html>
    ';

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    /*$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
    $cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
    $cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
    $cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/

    // Enviarlo
    $enviado=false;
    if (mail($para, $título, $mensaje, $cabeceras)){
        $enviado=true;
    }
    
?>