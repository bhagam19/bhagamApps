<?php
    $pathConex = $_SERVER['DOCUMENT_ROOT'];
    $pathConex .= "/negocioNormal/admin/1-model/conex.php";
    include ($pathConex);
    switch ($case){
        case 'perfiles':
            $consulta="SELECT * FROM perfiles";
            $query = $con->query($consulta);
            $cont=mysqli_num_rows($query);
        break;
        case 'crear':
            $consulta="INSERT INTO perfiles (descripcion) VALUES ('".$descripcion."')";
            $query=$con->query($consulta);
        break;
        case 'buscar':
            $consulta="INSERT INTO perfiles (descripcion) VALUES ('".$descripcion."')";
            $query=$con->query($consulta);
        break;
    }
?>