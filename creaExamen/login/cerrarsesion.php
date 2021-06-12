<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo 
	"
		<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=../principal/principal.php'>
			</head>
		</html>
	";
}else{
	session_destroy();
	echo 
	"
		<html>
			<head>
				<meta HTTP-equiv='REFRESH' content='0;url=../principal/principal.php'>
			</head>
		</html>
	";
}
?>