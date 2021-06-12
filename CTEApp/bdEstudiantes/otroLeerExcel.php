<?php
	include 'simplexlsx.class.php';
	$xlsx = new SimpleXLSX( 'usuarios.xlsx' );
	$conn = new PDO( "mysql:host=localhost;dbname=mibasededatos", "usuario", "clave");
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare( "INSERT INTO users (nombre, usuario, email, password) VALUES (?, ?, ?, ?)");
	$stmt->bindParam( 1, $nombre);
	$stmt->bindParam( 2, $usuario);
	$stmt->bindParam( 3, $email);
	$stmt->bindParam( 4, $password);
	foreach ($xlsx->rows() as $fields)
	{
	   $nombre = $fields[0];
	   $usuario = $fields[1];
	   $email = $fields[2];
	   $password = $fields[3];
	   $stmt->execute();
	}
?>