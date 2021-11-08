<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'perfil':
            $idUsuario=$_SESSION['idUsuario'];
            $idPerfil=$c;
            $consulta= "DELETE FROM usuarioxperfil WHERE idUsuario=".$idUsuario." AND idPerfil=".$idPerfil;
            $query4 = $con->query($consulta);
        break;
    }
?>