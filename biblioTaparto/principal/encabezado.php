<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>BIBLIO APP</title>
		<link rel="stylesheet" type="text/css" href="principal.css"/>
		<script type="text/javascript" src="javascripts.js"></script>
	</head>
	<body>				
		<div id="contenedor">	
			<div style="margin-bottom:5px;background:black;color:white;border-radius:10px;font-weight:bold;">
				<ul style="position:relative;list-style:none;display:inline;">
					<li style="position:relative;list-style:none;display:inline;padding:20px;margin:50px;">BiblioApp</li>
					<li style="position:relative;list-style:none;display:inline;padding:20px;margin:50px;">Version: 1.0</li>
					<li style="position:relative;list-style:none;display:inline;padding:20px;margin:50px;">Creado por: Adolfo Ruiz</li>
											
				</ul>					
			</div>
			<div id="encabezado">				
				<div id="encabezado-presentacion">
					<div class="titulo-aplicacion">
					BIBLIO APP
					</div>
				</div>
				<div id="usuario-registrado">
					<?php
					
					if(isset($_SESSION['usuario'])){
						echo'
							<div class="usuario-registrado">
								Bienvenido <br>'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'						
							</div>
							<div class="boton-cerrar">
							<a href="../login/cerrarSesion.php">Cerrar Sesión</a>
							</div>';
					}		
					?>		
				</div>				
			</div>