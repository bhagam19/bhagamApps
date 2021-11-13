<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include($path.'/negocioNormal/admin/1-model/conex.php');
    $consulta="SELECT * FROM usuarioxalertas WHERE idUsuario=".$_SESSION['id']." AND estado=2";
    $_SESSION['result']=$con->query($consulta);
    $count=mysqli_num_rows($_SESSION['result']);
    $_SESSION['numAlerta']=$count;
    if($count>=1){
        while($row=mysqli_fetch_row($_SESSION['result'])){
            $_SESSION['idUxA']=$row[0];
            $_SESSION['usuarioAlerta']=$row[1];
            $_SESSION['idAlerta']=$row[2];
            $_SESSION['fechaAlerta']=$row[3];
            $_SESSION['estadoAlerta']=$row[4];
            $consulta="SELECT * FROM alertas WHERE idAlerta='".$row[2]."'";
            $query=$con->query($consulta);
            $rowb=mysqli_fetch_row($query);
                $_SESSION['tipoAlerta']=$rowb[1];
                $_SESSION['descripcionAlerta']=$rowb[2];
                $_SESSION['textoAlerta']=$rowb[3];
        }
            
    }else{
        
    }
?>