<?php
    session_start();
    $mail=$_POST['mail'];
    $token=$_POST['token'];
    $codigo=$_POST['codigo'];
    $case="verificar";
    include ('./consultasSql.php');
    if ($contRows==1){
        $row=mysqli_fetch_row($query);
        $fecha=$row[4];
        $fechaActual=date("Y-m-d H:i:s");
        $segundos=strtotime($fechaActual)-strtotime($fecha);
        $minutos=$segundos/60;
        $correcto=false;
        if ($minutos<=10){
            $correcto=true;
            echo 'Todo ok';
            $_SESSION['mailCpass']=$mail;
            header('Location: http://localhost/negocioNormal/admin/2-vista/restablecerContrasena/cambiarContrasena.php');
        }else{
            header('Location: http://localhost/negocioNormal/admin/2-vista/restablecerContrasena/tokenVencido.php');
        }
    }else{
        header('Location: http://localhost/negocioNormal/admin/2-vista/restablecerContrasena/tokenIncorrecto.php');
    }
?>