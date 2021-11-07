<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'insertar':
            $consulta="INSERT INTO passwords (mail, token, codigo) VALUES ('".$mail."', '".$token."', ".$codigo.")";
            $query = $con->query($consulta);
        break;
        case 'verificar':
            $consulta="SELECT * FROM passwords WHERE mail='".$mail."' AND token='".$token."' AND codigo=".$codigo;
            $query = $con->query($consulta);
            $contRows = mysqli_num_rows($query);
        break;
        case 'verificarUsuario':
            $consulta="SELECT * FROM passwords WHERE mail='".$_SESSION['mailCpass']."'";
            $query = $con->query($consulta);
        break;
        case 'modificarUsuario':
            $consulta="UPDATE usuarios SET pass='".$pass."' WHERE mail='".$_SESSION['mailCpass']."'" ;
            $query = $con->query($consulta);
        break;
    }
?>