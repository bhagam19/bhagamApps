<?php
	include('../conexion/datosConexion.php');

	$utc = date ('U');
	$anio = date ('Y');
	$mes = date ('m');
	$dia = date ('d');
	$hora = date ('H');
	$min = date ('i');
	$seg = date ('s');
	@$ip=getenv(REMOTE_ADDR);
	$navegador=$_SERVER['HTTP_USER_AGENT'];
	@$usuarioLog=$_SESSION['usuario'];

	$pagVisitada="<a href=\'".$paginaLogs.".php\' target=\'_blank\'>".$linkLogs."</a>";

	if(!$usuarioLog){
		$usuarioLog="Anonimo";
	}

	$tabla='logs';
	mysqli_query($conexion,"INSERT INTO ".$tabla." (utc, anio, mes, dia, hora, minuto, segundo, ip, navegador, usuario,pagVisitada)
	VALUES ($utc,'$anio','$mes','$dia','$hora','$min','$seg','$ip','$navegador','$usuarioLog','$pagVisitada')");

	mysqli_close($conexion);
?>