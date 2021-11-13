<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'todos':
            $consulta="SELECT * FROM perfiles";
            $query = $con->query($consulta);
            $cont2=mysqli_num_rows($query);
        break;
        case 'id':
            $consulta="SELECT * FROM perfiles WHERE idPerfil = ".$idBorrar[$k];
            $query = $con->query($consulta);
            $cont2=mysqli_num_rows($query);
        break;
    }
?>