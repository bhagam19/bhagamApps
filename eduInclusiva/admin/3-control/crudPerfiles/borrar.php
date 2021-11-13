<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'borrar':
            $consulta="DELETE FROM perfiles WHERE idPerfil=".$idBorrar[$k];
            $query = $con->query($consulta);
        break;
        
    }
?>