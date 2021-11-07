<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    $idUsuario=$_SESSION['idUsuario'];
                                                                                                                    /*echo '<br>el usuario seleccionado fue :'.$idUsuario;*/
    switch ($case){
        case 'idPerfil':
            $consulta= "SELECT usuarioxperfil.idPerfil FROM perfiles
                        INNER JOIN usuarioxperfil
                        ON perfiles.idPerfil = usuarioxperfil.idPerfil
                        INNER JOIN usuarios
                        ON usuarioxperfil.idUsuario=usuarios.idUsuario
                        WHERE usuarios.idUsuario =".$idUsuario;
            $query3 = $con->query($consulta);
            $cont3=mysqli_num_rows($query3);
                                                                                                                    /*echo '<br>la cantidad de perfiles del usuario seleccionado son :'.$cont3;*/
        break;
        case 'id':
            $consulta="SELECT * FROM perfiles WHERE idPerfil = ".$idBorrar[$k];
            $query = $con->query($consulta);
            $cont2=mysqli_num_rows($query);
        break;
    }
?>