<?php
	include('../conexion/datosConexion.php');
	
	$tabla='usuarios';
	$sql=
		'
			CREATE TABLE '.$tabla.'(			
			usuarioID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(usuarioID),
			usuarioCED int(11) NOT NULL,
			usuario varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			contrasena varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
		    nombres varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			apellidos varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
			defUsuario int NOT NULL ,
			permiso int(1) NOT NULL
		)';
	
	mysqli_query($conexion,$sql);

?>