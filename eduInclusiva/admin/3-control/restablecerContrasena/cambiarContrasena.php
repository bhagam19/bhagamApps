<?php
if (isset($_POST['pass1'])){
    echo '$_POST['.'pass1'.'] fue declarada';
}else{
    echo '$_POST['.'pass1'.'] no fue enviada';
}
?>
<br />
<?php
if (isset($_POST['pass2'])){
    echo '$_POST['.'pass2'.'] fue declarada';
}else{
    echo '$_POST['.'pass2'.'] no fue enviada';
}
?>
<br />
<br />
<br />
<?php
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    session_start();
    if($pass1==$pass2){
        $case="verificarUsuario";
        include ('./consultasSql.php');
        if($query){
            $pass=hash('sha512','73b0c0eeb6e3b347a4c32822293c71c72dafa8f5b08961c1811ab425fdf06a5dbf27b3b3200a7731b65ca36ff80a743'.$pass1);
            $case="modificarUsuario";
            include ('./consultasSql.php');
            header('Location: http://localhost/negocioNormal/admin/2-vista/restablecerContrasena/cambioExitoso.php');
        }
    }else{
        $_SESSION['mensaje']='Las contraseñas ingresadas no son iguales. Por favor verificalas';
        header('Location: http://localhost/negocioNormal/admin/3-control/restablecerContrasena/cambiarContrasena.php');
    }
    
?>