<?php
	session_name("SINSIMAT");
	session_start();
	$tabla='usuarios';	
	$usuario=$_REQUEST['usuario'];
	$contrasena=$_REQUEST['contrasena'];
	require('../../03-cnt/index.php');
    $dato=new modeloController();
    $respuesta=$dato->validarLogin($tabla,$usuario,$contrasena);
	echo $respuesta;
?>