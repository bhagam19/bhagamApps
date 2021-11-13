<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'todos':
            $consulta="SELECT * FROM usuarios";
            $query = $con->query($consulta);
            $cont2=mysqli_num_rows($query);
        break;
        case 'selecId':
            $consulta="SELECT * FROM usuarios WHERE idUsuario = ".$idSelec;
            $query5 = $con->query($consulta);
            $cont5=mysqli_num_rows($query5);
        break;
        case 'id':
            $consulta="SELECT * FROM perfiles WHERE idPerfil = ".$idBorrar[$k];
            $query = $con->query($consulta);
            $cont2=mysqli_num_rows($query);
        break;
    }
?>