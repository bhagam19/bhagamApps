<?php
	session_name("SINSIMAT");
	session_start();
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	$tabla='usuarios';
	$condicion ='dane='.$usuario;
	require('../../03-cnt/index.php');
    $dato=new modeloController();
    $respuesta=$dato->validarLogin($tabla,$condicion,$contrasena);
	echo $respuesta;
?>