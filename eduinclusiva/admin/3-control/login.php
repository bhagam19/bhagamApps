<?php
    include ('../1-model/conex.php');
    session_start();
    $_SESSION['usuario']=$_POST['user'];
    $pass=hash('sha512','73b0c0eeb6e3b347a4c32822293c71c72dafa8f5b08961c1811ab425fdf06a5dbf27b3b3200a7731b65ca36ff80a743'.$_POST['pass']);
    $consulta="SELECT * FROM usuarios WHERE usuario='".$_SESSION['usuario']."' AND pass='".$pass."'";
    $query=$con->query($consulta);
    $cont=mysqli_num_rows($query);
    if($cont==1){
        while($row=mysqli_fetch_row($query)){
            $_SESSION['id']=$row[0];
            $_SESSION['usuario']=$row[1];
            $_SESSION['login']='true';
        }
        header('location: ../../index1.php');
        $_SESSION['mensaje']='Si está segur@ que ingresó los datos correctos, por favor comuníquese con el administrador del sitio a: administrador@correo.com';
    }else{
        $_SESSION['login']='false';
        $_SESSION['mensaje']=$count.'El usuario y/o la contraseña introducidos no son correctos. Por favor escriba un usuario y una contraseña válidos';
        header('location: ../2-vista/login.php');
    }
?> 