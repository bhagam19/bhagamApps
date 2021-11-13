<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'selected':
            $consulta="UPDATE `usuarioxperfil` SET `idUsuario`=[value-2],`idPerfil`=[value-3] WHERE 1";
            $query = $con->query($consulta);
        break;
    }
?>