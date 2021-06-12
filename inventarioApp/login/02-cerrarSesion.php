<?php
session_name("inventarioIEE");
session_start();

if(!isset($_SESSION['usuario'])){
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=../principal/acceso.php'>
			</head>
		</html>";
}else{
	session_destroy();
	echo 
		"<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=../principal/00-principal.php'>
			</head>
		</html>";
}
?>