<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/htmlclassb/admin/1-model/conex.php";
    include($path);
    $preparada="UPDATE alertas SET estado=1 WHERE idAlerta=".$_GET['idAlerta'];
    $con->query($preparada);
    header('Location: ../index.php')
?>