<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'perfil':
            $idUsuario=$_SESSION['idUsuario'];
            $idPerfil=$aGuardar;
            $consulta= "INSERT INTO usuarioxperfil (idUsuario, idPerfil) VALUE(".$idUsuario.", ".$idPerfil.")";
            $query5 = $con->query($consulta);
                                                                                                                                        /*echo '<br> '.'>>>>>>>>>>>>>Listo, ya guardado'.$aGuardar;*/
        break;
    }
?>